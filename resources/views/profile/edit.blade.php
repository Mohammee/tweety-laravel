<x-app>
    <h2 class="font-bold text-lg mb-4 text-gray-700">Edit profile :)</h2>

    <form method="POST" action="{{$user->profilePath('update')}}" enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="username" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                UserName
            </label>
            <input required value="{{$user->username}}" type="text" id="username" name="username"
                   class="@if($errors->has('username')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">
            @error('username')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="name" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Name
            </label>
            <input required value="{{$user->name}}" type="text" id="name" name="name"
                   class=" @if($errors->has('name')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">
            @error('name')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Email
            </label>
            <input required value="{{$user->email}}" type="email" id="email" name="email"
                   class=" @if($errors->has('email')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">
            @error('email')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="desc" class="block text-xs text-gray-700 font-bold uppercase mb-2">
                Description
            </label>

            <textarea id="desc" name="description" class="w-full
            @if($errors->has('description')) border border-red-500
            @else border border-gray-300
            @endif ">
                {{$user->description}}
            </textarea>

            @error('description')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror

        </div>


        <div class="mb-6">
            <label for="avatar" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Avatar
            </label>
            <div class="flex">
                <input type="file" id="avatar" name="avatar"
                       class=" @if($errors->has('avatar')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">

                <img
                    src="{{$user->avatar}}"
                    id="show_avatar"
                    alt="your avatar"
                    class="h-12 w-12 object-cover"
                >
            </div>

            @error('avatar')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="banner" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Banner
            </label>
            <div class="flex">
                <input type="file" id="banner" name="banner"
                       class=" @if($errors->has('banner')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">

                <img
                    src="{{$user->banner}}"
                    alt="your banner"
                    id="show_banner"
                    class="h-12 w-28 object-cover"
                >
            </div>

            @error('banner')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="password" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Password
            </label>
            <input  type="password" id="password" name="password" placeholder="change your password if you wont(iptional)"
                   class=" @if($errors->has('password')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">
            @error('password')
            <p class="text-red-600">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="confpassword" class=" block text-xs text-gray-700 font-bold uppercase mb-2">
                Conform Password
            </label>
            <input  type="password" id="confpassword" name="password_confirmation"
                   class="@if($errors->has('password')) border border-red-500 @else border border-gray-300 @endif p-2 w-full">
            @error('password')
            <p class="text-red-600  text-sm">{{$message}}</p>
            @enderror
        </div>


        <button class="border border-blue-400 bg-blue-300 rounded-lg px-4 py-2 mr-4" type="submit">Update</button>
        <a href="{{$user->profilePath()}}" class="hover:underline text-xl">Cancel</a>
    </form>
</x-app>
