<x-app>


    <header class="mb-6">

        <div class="relative">
            <img class="rounded-2xl w-full object-cover" src="{{$user->banner}}"
                 alt="Banner profile image" style="width:611.2px; height:194.717px">

            <a href="{{$user->profilePath()}}">
                <img src="{{$user->avatar}}"
                     class=" absolute rounded-full bottom-0 transform -translate-x-1/2 translate-y-1/2"
                     style="left: 50%;width: 150px ; height: 150px"
                     alt="your avatar"
                >
            </a>
        </div>


        <div class="lg:flex lg:justify-between  mt-4 mb-6 items-center">

            <div style="max-width: 200px">
                <h3 class="text-xl mb-0 font-bold text-gray-700">{{$user->name}}</h3>
                <p class="text-sm">Joined: {{ $user->created_at->diffForHumans() }}</p>
            </div>

            @auth
            <div class="flex">
                @can('edit' , $user)
                    <a href="{{$user->profilePath('edit')}}">
                        <button
                            class="border border-gray-300 text-xs mr-2
                   font-bold py-2 px-4 rounded-full">
                            Edit Profile
                        </button>
                    </a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
            @endauth

        </div>

        <p class="text-sm">{{$user->description}}</p>


    </header>


    @include('_timeline' , ['tweets' => $tweets])


</x-app>
