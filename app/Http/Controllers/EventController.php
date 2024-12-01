<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('welcome');
    }

    public function juRegistration()
    {
        return view('register_ju');
    }

    public function otherRegistration()
    {
        return view('register_other');
    }

}
