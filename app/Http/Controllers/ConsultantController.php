<?php

namespace App\Http\Controllers;

use App\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $consultants = Consultant::all();
      return response()->json($consultants);
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
        'name' => 'required|string|max:255',
        'date_of_birth'=>'required|date_format:"Y-m-d"',
        'gender'=>'required|string|max:6',
        'address'=>'required|string|max:255',
        'phone'=>'required|string|max:255',
        'login_id'=>'required|exists:logins,id',
        'picture'=> 'mimes:jpeg,png'

      ]);
      $consultant = new Consultant([
        'name' => $data['name'],
        'date_of_birth' => $data['date_of_birth'],
        'gender' => $data['gender'],
        'address' => $data['address'],
        'phone' => $data['phone'],
        'login_id' => $data['login_id'],
        'picture'=> $data['mimes:jpeg,png']

      ]);
      $consultant -> save();
      return response()->json($consultant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function show(Consultant $consultant)
    {
        return response()->json($consultant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultant $consultant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultant $consultant)
    {
      $data = $request->json()->all();
      $request->validate([
        'name' => 'required|string|max:255',
        'date_of_birth'=>'required|date_format:"Y-m-d"',
        'gender'=>'required|string|max:6',
        'address'=>'required|string|max:255',
        'phone'=>'required|string|max:255',
        'login_id'=>'required|exists:logins,id',
        'picture'=> 'mimes:jpeg,png'

      ]);
      $consultant->name = $data['name'];
      $consultant->date_of_birth = $data['date_of_birth'];
      $consultant->gender = $data['gender'];
      $consultant->address = $data['address'];
      $consultant->phone = $data['phone'];
      $consultant->login_id = $data['login_id'];
      $consultant->picture = $data['mimes:jpeg,png'];
      $consultant->save();
      return response()->json($consultant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultant  $consultant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultant $consultant)
    {
        $consultant->delete();
        return "Deleted Successfully";
    }
}
