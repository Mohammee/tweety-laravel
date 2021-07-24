<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\UserFollowed;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()
            ->user()
            ->toggle($user);




         if(auth()->user()->following($user)){
             $user->notify(new UserFollowed(current_user(),true));
             $message = 'You are follow ' . $user->username .' 😃!!';
         }
         else{
             $user->notify(new UserFollowed(current_user()));
             $message = 'You are unFollow ' . $user->username .' 😃!!';
         }
        return back()->with('notify-message' , $message);;
    }


}
