<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $request->validate([
          'user_id' => 'required|exists:users,id',
          'consultant_id' => 'required|exists:consultants,id',
          'message' => 'required|string|max:255',
          'rating' => 'required|integer'
        ]);
        $feedback -> save();
        return response()->json($feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        return response()->json($feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $data = $request->json()->all();
        $request->validate([
          'user_id' => 'required|exists:users,id',
          'consultant_id' => 'required|exists:consultants,id',
          'message' => 'required|string|max:255',
          'rating' => 'required|integer'
        ]);
        $feedback->user_id = $data['user_id'];
        $feedback->consultant_id = $data['consultant_id'];
        $feedback->message = $data['message'];
        $feedback->rating = $data['rating'];
        $feedback->save();
        return response()->json($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $consultant->delete();
        return "Deleted Successfully";
    }
}
