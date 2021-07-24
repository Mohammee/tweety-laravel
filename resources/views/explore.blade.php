
<x-app>
    <div class="grid grid-cols-2 gap-6">
        @foreach($users  as  $user)

                <a href="{{$user->profilePath()}}" class="flex ml-6 mb-4 items-center">

                    <img src="{{$user->avatar}}" alt="{{$user->username}}'s avatar"
                         style="width: 60px ; height: 60px"
                         class="mr-4">

                    <div class="font-bold">
                        {{ '@' . $user->username }}
                    </div>

                </a>

        @endforeach
    </div>

    <div class="mt-8">
        {{$users->links('pagination::tailwind')}}
    </div>
</x-app>
