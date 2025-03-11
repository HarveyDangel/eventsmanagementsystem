<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminController extends Controller
{
    //
    public function index() 
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(5); 
        return view("admin.dashboard",compact("events"));
    }
}
