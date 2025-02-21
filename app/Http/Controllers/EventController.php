<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("events.index", [
            "events" => Event::all(),
        ]);
        
    }

    public function userIndex()
    {
        //
        return view("events.index", [
            "events" => Event::user_id(),
        ]);
        
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
        //
        $request->validate([
            "name"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "Category"=> "required|string",
            "venue"=> "required|string",
            "image"=> "image|mimes:png,jpg,jpeg|max:2048",
            "start_date"=> "required|dateTime",
            "end_date"=> "required|dateTime",
            "duration"=> "required|string",
            "status"=> "required|string",
            "comments"=> "nullable|string",
            "user_id"=> "nullable|string",
        ]);

        $imagePath = null;
        if ($request->hasFile("image")) 
        {
            $imagePath = $request->file("image")->store("post", "public");
        }

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'venue' => $request->venue,
            'image' => $imagePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
            'status' => $request->status,
            'comments' => $request->comments,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route("events.index")->with("message", "Event created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
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
        //
        $request->validate([
            "name"=> ["nullable","string","max:255"],
            "description"=> ["nullable","string", "max:255"],
            "Category"=> ["nullable","string"],
            "venue"=> ["nullable","string"],
            "image"=> ["nullable","string"],
            "start_date"=> ["nullable","dateTime"],
            "end_date"=> ["nullable","dateTime"],
            "duration"=> ["nullable","string"],
            "status"=> ["nullable","string"],
            "comments"=> ["nullable","string"],
            "user_id"=> ["nullable","string"],
        ]);

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

        return redirect()->route("events.index")->with("message", "Event deleted successfully");
    }
}
