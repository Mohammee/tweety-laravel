<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        return view('profile.show', ['user' => $user,
            'tweets' => $user->tweets()->withlikes()->paginate(10)
        ]);
    }

    public function edit(User $user)
    {
//        abort_if($user->isNot(current_user()),404);
        // $this->authorize($user); in web.php middleware
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {

        $attributes = request()->validate([
            'username' => ['required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
              'description' => ['string' , 'nullable' , 'min:10' ,'max:255'],
            'avatar' => ['image','max:500000'],
            'banner' => ['image'],
            'password' => ['string', 'nullable' ,'min:8', 'max:255', 'confirmed']
        ]);

//        $password = $attributes['password'];
//        if(!is_null($password)){
//            $password = \Hash::make($password);
//        }
//        $attributes['password'] = $password;

//      don't forget fillable for avatar
        $olfData = $user->getAttributes();

        if(empty($attributes['password']))
        {
            $attributes['password'] = $olfData['password'];
        }

        if(request(['avatar'])) {
            if (isset($olfData['avatar']) && $olfData['avatar']) {
                Storage::delete($olfData['avatar']);
            }
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        if(request(['banner'])) {
            if (isset($olfData['banner']) && $olfData['banner']) {
                Storage::delete($olfData['banner']);
            }
            $attributes['banner'] = request('banner')->store('banners');
        }

        $user->update($attributes);
        return redirect($user->profilePath());
    }
}
