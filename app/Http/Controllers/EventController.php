<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
    public function store(Request $request)
    {
        if (Gate::denies('create', Event::class)) {
            abort(403, 'Unauthorized action.');
        }
        $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string|max:255",
            "category" => "required|string",
            "venue" => "required|string",
            "image" => "image|mimes:png,jpg,jpeg|max:2048",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "duration" => "required|string",
            "comments" => "nullable|string",
        ]);

        // dd($request->all());

        $imagePath = null;
        if ($request->hasFile("image")) {
            $imagePath = $request->file("image")->store("events", "public");
        }

        Event::create([
            'user_id' => $request->user_id, // Store the user ID
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'venue' => $request->venue,
            'image' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
            'comments' => $request->comments,
        ]);

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


    // public function delete($id) {
    //     $event = Event::findOrFail($id);
    //     $event->status = 'deleted';
    //     $event->save();
    
    //     return response()->json(['success' => true]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        $this->authorize('update', $event);

        return view("events.edit", compact("event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {

        $request->validate([
            "name" => ["nullable", "string", "max:255"],
            "description" => ["nullable", "string", "max:255"],
            "category" => ["nullable", "string"], // Fixed typo (Category → category)
            "venue" => ["nullable", "string"],
            "image" => ["nullable", "image", "mimes:png,jpg,jpeg|max:2048"], // Fixed image validation
            "start_date" => ["nullable", "date"],
            "end_date" => ["nullable", "date", "after_or_equal:start_date"], // Ensures valid date order
            "duration" => ["nullable", "string"],
            "status" => ["nullable", "string"],
            "comments" => ["nullable", "string"],
            "user_id" => ["nullable", "exists:users,id"], // Ensures valid user ID
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
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
