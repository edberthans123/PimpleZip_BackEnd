<?php

namespace App\Http\Controllers;

use JWTAuth;
use Hash;
use App\Login;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
  public function register(RegisterFormRequest $request)
  {
      $login = Login::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 2,
        //'username' => $request->username,
      ]);
      return response([
          'status' => 'success',
          'data' => $login
      ], 200);

      $user = User::create([
        'name' => $request->name,
        'date_of_birth' => $request->date_of_birth,
        'gender' => $request->gender,
        'address' => $request->address,
        'phone' => $request->phone,
        'login_id' => $request ->login_id
      ]);

      return response([
          'status' => 'added successfully',
          'data' => $user
      ], 200);
  }

  public function login(Request $request)
  {
      $credentials = $request->only('email', 'password');

      if ( ! $token = JWTAuth::attempt($credentials) ) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
      }
      return response([
            'status' => 'success',
            'token' => $token
        ])
        ->header('Authorization', $token);
  }

  public function logout()
	{
	    JWTAuth::parseToken()->invalidate();
	    return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
	}

	public function user(Request $request)
	{
	    $user = User::find(Auth::user()->id);
	    return response([
            'status' => 'success',
            'data' => $user
        ]);
	}

	public function refresh()
	{
	    return response([
            'status' => 'success'
        ]);
	}
  /**
  * Create a new AuthController instance.
  *
  * @return void
  */

 /**
  * Get the authenticated User.
  *
  * @return \Illuminate\Http\JsonResponse
  */

}
