<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-grey-300'}} tweet">
    <div class="mr-4 flex-shrink-0">
        <a href="{{$tweet->user->profilePath()}}">
            <img
                src="{{$tweet->user->avatar}}"
                alt=""
                class="rounded-full w-12 h-12 object-cover"
            >
        </a>
    </div>

    <div>

        <div class="flex items-center mb-4">

            <a href="{{$tweet->user->profilePath()}}">
                <h5 class="font-bold text-gray-700 mr-4">{{$tweet->user->name}}</h5>
            </a>

            <p class="text-xs">{{$tweet->created_at->diffForHumans()}}</p>

            @auth
            <x-delete-tweet-button :tweet="$tweet"/>
            @endauth

        </div>

        <p class="text-sm mb-3">{!! $tweet->body !!}</p>
        @if($tweet->image)
            <img src="{{ $tweet->image }}" class="block mb-2 h-80 object-cover"/>
        @endif

        @auth
        {{--          add markup like and dislike--}}
        <x-like-button :tweet="$tweet"/>
        @endauth


    </div>

</div>
