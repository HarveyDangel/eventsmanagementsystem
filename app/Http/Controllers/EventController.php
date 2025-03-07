<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        $events = Event::orderBy('start_date', 'asc')->get(); // Adjust limit as needed
        return view('welcome', compact('events'));
    }

    public function index()
    {
        //
        return view("events.index", [
            "events" => Event::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }

    public function userIndex()
    {
        //
        return view("events.index", [
            "events" => Event::user_id(),
        ]);
    }

    public function eventHistory()
    {
        return view("events.events-history");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("events.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
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
        if ($event->image) {
            Storage::disk("public")->delete($event->image);
        }
        $event->delete();

        Alert::success('Congrats!', 'An event has been deleted.');

        return redirect()->route("events.index")->with("message", "Event deleted successfully");
    }
}
