<?php

namespace App\Http\Controllers;

// use App\Tweet;
// use App\User;
// use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User as Authenticatable; 
// use Illuminate\Notifications\Notifiable;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    // public function index()
    // {
    //     $tweets = Tweet::latest()->get();

    //     return view('home', [
    //         'tweets' => $tweets
    //     ]);
    // }


    public function index()
    {
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
