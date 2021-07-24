<div class="bg-blue-50 border border-gray-300 rounded-2xl py-4 px-6">
    <h3 class="font-bold mb-4 text-xl">Following</h3>
    <ul>
        @forelse($follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4'}}">
                <div>
                    <a href="{{$user->profilePath()}}" class="flex items-center text-sm">

                        <img
                            src="{{$user->avatar}}"
                            alt=""
                            class="rounded-full mr-2"
                            style="width: 40px; height: 40px"
                        >
                        {{$user->name}}
                    </a>
                </div>
            </li>
            @empty
                <li class="text-blue-400 text-sm">
                    No Friends Yet!!
                </li>
            @endforelse

    </ul>
</div>
