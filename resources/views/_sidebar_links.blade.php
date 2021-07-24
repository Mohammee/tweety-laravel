<ul>
    <li>
        <a href="{{route('home')}}" class="font-bold block mb-4 text-lg">Home</a>
    </li>
    <li>
        <a href="/explore" class="font-bold block mb-4 text-lg">Explore</a>
    </li>
    <li>
        <a href="/notifications" class="font-bold block mb-4 text-lg">Notifications</a>
    </li>

    @auth
    <li>
        <a href="{{auth()->user()->profilePath()}}" class="font-bold block mb-4 text-lg">Profile</a>
    </li>
    @endauth

    <li>
        {{--        <a href="#" class="font-bold block mb-4 text-lg" onclick="document.forms[0].submit()">Logout</a>--}}
        {{--        <form method="POST" action="{{route('logout')}}"  class="inline">--}}
        {{--            @csrf--}}
        {{--        </form>--}}

        <form method="POST" action="{{route('logout')}}">
            @csrf
            <button class="font-bold  mb-4 text-lg">Logout</button>
        </form>
    </li>
</ul>
