<?php

namespace App\Models;

use App\Traits\Followable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //or $guarded[]
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
        'description',
        'banner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function timeline()
    {
//        $ids = $this->follows->pluck('id');
//        $ids->push($this->id);
//        return Tweet::whereIn('user_id', $ids)
//            ->latest()
//            ->get();

        $freinds = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $freinds)
            ->orWhere('user_id', $this->id)
            ->withlikes()
            ->latest()
            ->paginate(10);
    }

//    public function getMinAvatarAttribute()
//    {
//        return 'https://i.pravatar.cc/40?u=' . $this->email;
//    }
//this method and image for test in first of my program


    public function profilePath($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    //to hash password automatic when update profile
//    public function setPasswordAttribute($value)
//    {
//        $this->attributes['password'] = \Hash::make($value);
//    }

    public function setPasswordAttribute($password)
    {
        //don't good but for rehash password does not as same round
        if (\Hash::needsRehash($password))
            $password = \Hash::make($password);

        $this->attributes['password'] = $password;
    }

    public function getAvatarAttribute($value)
    {
//             if(empty($value))
//             {
//                 return asset('image/default-avatar.jpeg');
//             }
//
//            return asset($value);

        return asset($value ? 'storage/' . $value : '/image/default-avatar.jpeg');
    }

    public function getBannerAttribute($value)
    {
        return (asset($value ? 'storage/' . $value : '/image/default-profile-banner.jpg'));
    }


    public function isSuperAdmin()
    {
        return $this->email === 'admin@gmail.com';
    }


}
