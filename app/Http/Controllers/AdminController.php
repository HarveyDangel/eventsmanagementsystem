<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() 
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5); // Admin sees all events
            return view("admin.dashboard", compact("events"));
    }
}
