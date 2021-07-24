<?php


namespace App\Traits;


use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
      //be caurfull of $tweet->likes is not the relation only if you use scope
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id , sum(liked) likes , sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function isDislikedBy($user)
    {
        return (bool)$user
            ->likes()
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }


    public function isLikedBy($user)
    {
        return (bool)$user
            ->likes()
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }


    public function like($user = null, $liked = true)
    {
        //this if user press again in the same button delete it
        if($this->isLikedBy($user) && $liked == true || $this->isDislikedBy($user) && $liked == false){
            return $this
                ->likes()
                ->delete([
                    'user_id' => $user ? $user->id : auth()->id()
                ]);
        }

        $this
            ->likes()
            ->updateOrCreate(
                ['user_id' => $user ? $user->id : auth()->id()],
                ['liked' => $liked]
            );
    }

    public function dislike($user = null)
    {
        $this
            ->like($user, false);
    }

    public function likes()
    {
       return  $this->hasMany(Like::class);
    }


    //another method to get likes and dislikes by use relation and ->withCount('likes' , 'dislikes') return column {relation)_count
//    public function likes()
//    {
//        return $this->hasMany(Like::class)->where('liked',true);
//    }
//
//    public function dislikes()
//    {
//        return $this->hasMany(Like::class)->where('liked', false);
//    }

}
