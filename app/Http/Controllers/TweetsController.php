<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Notifications\NewTweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{


    public function index()
    {
      $tweets = auth()->user()->timeline();
        return view('tweets.index',
            ['tweets' => $tweets]);
    }

    public function store()
    {

        $attribute = request()->validate([
            'body' => 'required|max:255|min:6',
             'image' => 'image|max:500000'
        ] , ['body.required' => 'This field required 😃 !!']);

        if(request('image'))
        $image = request('image')->store('images');
        else
            $image = null;


        //       auth()->user()->tweets()->create($attribute);
        $tweet = Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attribute['body'],
            'image' => $image
        ]);

        $tweet->user->followers()->get()->map(function ($user) use($tweet){
            $user->notify(new NewTweet($tweet));
        });


        return redirect()->route('home')->with('notify-message' , 'tweet publish successfully 😃!!');
     }


    public function destroy(Tweet $tweet)
    {
        $this->authorize($tweet->user);
        $tweet->delete();

        return back()->with('notify-message' , 'tweet delete successfully 😃!!');
     }
}
