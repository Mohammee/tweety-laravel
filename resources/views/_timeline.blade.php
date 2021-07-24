{{--all tweets as variable tweets is for all follows and user or for a spacific user--}}

<div class="border border-grey-300 rounded-2xl">

    @forelse($tweets as $tweet)
        @include('-tweet')
    @empty
        <p class=" my-4  pl-4  text-sm text-blue-400">No Tweets Yet!!</p>
    @endforelse


     {{$tweets->links('pagination::tailwind')}}
</div>
