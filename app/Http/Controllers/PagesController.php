<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
      $title = 'PimpleZip';
      //return view('pages.index', compact('title'));
      return view('pages.index')->with('title',$title);
    }

    public function about(){
      $title = 'PimpleZip - About';
      return view('pages.about')->with('title',$title);
    }

    public function services(){
      $data = array(
        'title' => 'PimpleZip - Services',
        'services' => ['Web Design','Programming','SEO']
      );
      return view('pages.services')->with($data);
    }

    public function login(){
      $title = 'PimpleZip - Login';
      return view('pages.login')->with('title',$title);
    }

}
