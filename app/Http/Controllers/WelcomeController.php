<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Feedback;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function welcome()
    {
        $feedbacks = Feedback::orderBy('created_at', 'asc')->get(); // Adjust limit as needed
        $events = Event::orderBy('start_date', 'asc')->get(); 
        return view('welcome', compact('feedbacks', 'events'));
    }

    // public function welcome()
    // {
    //     // Adjust limit as needed
    //     return view('welcome', compact('events'));
    // }
}
