<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:5|max:1000',
        ]);

        // Store the feedback
        Feedback::create([
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        Alert::success('Thank You!', 'Your feedback means the world to us! We appreciate your time and thoughts.');

        // Redirect with success message
        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
