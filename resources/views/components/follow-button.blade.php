@unless(current_user()->is($user))
    <form method="POST" action="{{route('follow',$user->username)}}">
        @csrf
        <button type="submit"
                class=" @if(current_user()->following($user)) bg-red-400 @else  bg-blue-400  hover:bg-blue-600 @endif
                    text-xs text-white font-bold py-2 px-4 rounded-full">
            {{current_user()->following($user) ? 'Un Follow' : 'Follwo Me'}}
        </button>
    </form>

@endunless
