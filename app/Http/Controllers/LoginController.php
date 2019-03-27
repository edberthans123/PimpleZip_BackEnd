<?php

namespace App\Http\Controllers;

use App\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminaconte\Http\Response
     */
    public function index()
    {
      $logins = login::all();
      return response()->json($logins);
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
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'role_id' => 'required|exists:roles,id'
      ]);
      $login = new Login([
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role_id' => $data['role_id']
      ]);
      $login -> save();
      return response()->json($login);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(login $login)
    {
        return response()->json($login);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login $login)
    {
      $data = $request->json()->all();
      $request->validate([
        'email'=>'required|unique:logins,email|string|max:255',
        'password'=>'required|string|max:255',
        'role_id'=>'role_id|exists:roles,id'
      ]);
      $login->email = $data['email'];
      $login->password = $data['password'];
      $login->role_id = $data['role_id'];
      $login->save();
      return response()->json($login);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(login $login)
    {
      $login->delete();
      return "Deleted Successfully";
    }
}
