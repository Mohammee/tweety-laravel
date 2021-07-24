<?php


namespace App\Traits;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Followable
{

    public function follows()
    {    //select * from users inner join follows on id = follows.following_user_id WHERE user_id = 1;
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id')
            ->withTimestamps();
    }

    public function follow($user)
    {
        $this->follows()->syncWithoutDetaching($user);
    }

    public function toggleFollow($user)
    {

        if ($this->following($user)) {

           return $this->unFollow($user);
        }

        return $this->follow($user);
    }

    //toggle from laravel relations
    public function toggle($user)
    {
        $this->follows()->toggle($user);
    }

    public function following($user)
    {
        //This first it not good because if you follow 3000 person it give all these and search for user its so tired
        // $this->follows->contains($user);
        return $this->follows()
            ->where('id', $user->id)
            ->exists();
    }

    public function unFollow($user)
    {
        $this->follows()->detach($user);
    }

    public function scopeFollowers(Builder $query)
    {
        $query->whereHas('follows' , function (Builder $query){
            $query->where('following_user_id' , $this->id);
        });
    }
}
