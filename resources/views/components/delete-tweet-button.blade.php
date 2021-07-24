
<div style="display: none">
    @can('delete' , $tweet->user)
        <a href="#" class="rounded-lg bg-red-500 px-2 py-1 ml-2 text-xs  text-white"
           onclick="if(confirm('Are you sure?')) document.getElementById('{{$tweet->id}}').submit();">Delete</a>
        <form action="/tweet/{{$tweet->id}}/delete" method="POST" id="{{$tweet->id}}">
            @csrf
            @method('DELETE')
        </form>
    @endcan
</div>
