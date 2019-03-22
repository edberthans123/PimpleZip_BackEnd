<?php

namespace App\Http\Controllers;

use JWTAuth;
use Auth;
use Uuid;
use Hash;
use Illuminate\Http\Request;
use App\User;
use Storage;
use App\Login;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return response()->json($users);
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
      $path = Storage::putFile('public/ProfilePicture', $request->file('picture') );
      $user = new User([
        'name' => $request->name,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'address' => $request->address,
        'phone' => $request->phone,
        'login_id' => $request->login_id,
        'picture'=> $path
      ]);
      $user -> save();
      return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
      $user->name = $data['name'];
      $user->date_of_birth = $data['date_of_birth'];
      $user->gender = $data['gender'];
      $user->address = $data['address'];
      $user->phone = $data['phone'];
      $user->login_id = $data['login_id'];
      $user->picture = $data['mimes:jpeg,png'];
      $user->save();
      return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user->delete();
        return "Deleted Successfully";
    }
}
