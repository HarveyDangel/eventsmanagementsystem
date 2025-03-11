<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventPostRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{

    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        // Check if the user is allowed to view all events (admin)
        if (Gate::allows('viewAny', Event::class)) {

            $events = Event::orderBy('created_at', 'desc')->paginate(5); // Admin sees all events
            return view("events.adminIndex", compact("events"));

        } else {

            $events = Event::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5); // User sees only their events
            return view("events.index", compact("events"));
        }

    }

    public function eventHistory()
    {
        if (Auth::user()->is_admin === "0" ){

            $events = Event::orderBy('created_at', 'desc')->paginate(5);
            return view("events.admin-events-history", compact("events"));
        }
        else {
            return view("events.events-history");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (Gate::allows("create", Event::class)) {
            return view("events.create");
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventPostRequest $request)
    {
        if (Gate::denies('create', Event::class)) {
            abort(403, 'Unauthorized action.');
        }
        
        $validated = $request->validated();
  
        $imagePath = null;
        if ($request->hasFile("image")) {
            $imagePath = $request->file("image")->store("events", "public");
        }
        $validated['image'] = $imagePath;
        $validated['user_id'] = $request->user_id;

        Event::create($validated);

        Alert::success('Congrats!', 'A new event has been added.');
        return redirect()->route("events.index")->with("message", "Event created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if (Gate::allows('view', $event)) {
            return view('events.show', compact('event'));
        }
        abort(403, 'Unauthorized action.');
    }

    public function updateStatus(Request $request, Event $event)
    {
        $event->update(['status' => $request->status]);
        return response()->json(['success' => true]);
    }

    public function addComment(Request $request, Event $event) {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);
    
        // Update the event's comment field
        $event->update([
            'comments' => $request->comment,
        ]);
    
        return response()->json(['success' => true]);
    }

    public function delete(Request $request, Event $event)
    {
        $event->update(['status' => $request->status]);
        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        if (Gate::denies('update', $event)) {
            abort(403, 'Dili pwede ga.');
        }
        return view("events.edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventUpdateRequest $request, Event $event)
    {

        $valrequest = $request->validated();
        // dd($request->all());
        // Handle image upload
        if (isset($valrequest["image"])) {

            if ($request->hasFile('image')) {
                if ($event->image) {
                    Storage::disk('public')->delete($event->image);
                }
                // Store new image
                $imagePath = $request->file('image')->store('events', 'public');
                $event->image = $imagePath;
            }
            // Delete old image if it exists
        }

        // Update event with validated data
        $event->update($request->except(['image'])); // Exclude image to update it separately

        // Save the new image path if updated
        if (isset($imagePath)) {
            $event->save();
        }

        Alert::success('Updated!', 'Event details have been updated.');

        return redirect()->route('events.index')->with('message', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        if (Gate::denies('delete', Event::class)) {
            abort(403, 'Unauthorized action.');
        }

        if ($event->image) {
            Storage::disk("public")->delete($event->image);
        }
        $event->delete();

        Alert::success('Congrats!', 'An event has been deleted.');

        return redirect()->route("events.index")->with("message", "Event deleted successfully");
    }
}
