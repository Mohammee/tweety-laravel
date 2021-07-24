<x-app>

    @forelse($notifications as $notification)

        @if($notification->type === 'App\Notifications\UserFollowed')
            <div class="border-l-4 border-blue-500 rounded-lg">
                <div class="flex w-full bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-2">
                    <div class="px-2 py-3 flex">
                        <img class="w-12 h-12 object-cover rounded-full mt-4" src="{{ $notification->data['avatar'] }}">
                        <div class="px-2">
                            <h2 class="text-xl font-semibold text-gray-800">You have {{$notification->data['follow']}} <a
                                    href="{{route('profile' , $notification->data['username'])}}"
                                    class="text-blue-500">{{'@' . $notification->data['username']}}</a>
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        @endif

        @if($notification->type === 'App\Notifications\NewTweet')
            <div class="border-l-4 border-blue-500 rounded-lg">
                <div class="flex w-full bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-2">
                    <div class="flex px-2 py-3">
                        <img class="w-12 h-12 object-cover rounded-full mt-8" src="{{ $notification->data['avatar'] }}">
                        <div class="mx-3 self-center">
                            <h2 class="text-xl font-semibold text-gray-800">User <a
                                    href="{{ route('profile', $notification->data['username']) }}"
                                    class="text-blue-500">{{ '@' . $notification->data['username'] }}
                                </a> posted new tweet <span class="text-blue-500 text-sm font-semibold">{{$notification->data['time']}}</span>.</h2>
                            <p class="text-gray-600">{{ $notification->data['tweet'] }}</p>
                            @if (($notification->data['image']))
                                <img src="{{ $notification->data['image'] }}" alt=""
                                     class="my-2 w-auto h-40 object-cover">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

            @if($notification->type === 'App\Notifications\UserMentioned')
                <div class="border-l-4 border-blue-500 rounded-lg">
                    <div class="flex w-full bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300 mb-2">
                        <div class="px-2 py-3 flex">
                            <img class="w-12 h-12 object-cover rounded-full mt-4" src="{{ $notification->data['avatar'] }}">
                            <div class="px-2">
                                <h2 class="text-xl font-semibold text-gray-800">User <a
                                        href="{{route('profile' , $notification->data['username'])}}"
                                        class="text-blue-500">{{'@' . $notification->data['username']}}</a>
                                    mention to you!!
                                </h2>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
    @empty
        <div class="border-l-4 border-blue-500 rounded-lg">
            <div class=" w-full bg-white shadow-lg rounded-lg border border-gray-300 mb-2">
                <div class=" px-2 py-3">
                    <p class="text-md text-green-400">No notificatoins yet!!</p>
                </div>
            </div>
        </div>
    @endforelse

    <div class="mt-8">
        {{$notifications->links('pagination::tailwind')}}
    </div>
</x-app>
