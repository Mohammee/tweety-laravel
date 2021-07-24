<?php

namespace App\Models;

use App\Notifications\NewTweet;
use App\Notifications\UserMentioned;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class Tweet extends Model
{
    use HasFactory, Likeable;


    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImageAttribute($image)
    {
        return $image ? asset('storage/' . $image) : '';
    }

    protected static function booted()
    {
        static::deleting(function (Tweet $tweet) {
            $attributes = $tweet->getAttributes();

            if (isset($attributes['image']) && $attributes['image']) {
                Storage::delete($attributes['image']);
            }
        });

        static::created(function (Tweet $tweet) {
            $users = $tweet->getMentionedUsers();
            if (!$users) {
                return;
            }

            Notification::send($users, new UserMentioned($tweet->user));
        });

    }

    public function getMentionedUsers()
    {
        $pattern = '/[@]([a-zA-z0-9_\-\.]+)\b/';
        $matchesNum = preg_match_all($pattern, $this->body, $matches);//return number of match or 0 == false

        if (!$matchesNum) {
            return false;
        }

        $usernames = array_unique($matches[1]);
        //for add some feature
        $replacements = [];
        $patterns = [];

        foreach ($usernames as $username)
        {
            if(User::where('username', $username)->exists()){
                $replacements[] = '<a href="' . route('profile' , $username) . '" class="text-blue-500">' . $username .'</a>';
                $patterns[] = '/' . $username  . '/';
            }
            else
            {
                $replacements[] = $username;
                $patterns[] = '/' . $username  . '/';
            }
        }

        $replace = preg_replace($patterns, $replacements , $this->body);
        $this->body = $replace;
        $this->save();

        return User::whereIn('username', $usernames)->get();
    }

}
