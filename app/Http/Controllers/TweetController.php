<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required']);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }

    // public function viewLikes(Request $request)
    // {
        
    //     $tweet = $request->id;
    //     // $tweet = Tweet::all();
    //     dd($tweet);
    //     return view('tweets.show');
    // }
}
