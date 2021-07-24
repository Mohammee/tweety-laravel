@if($message = session('notify-message'))
    <div class="fixed bottom-10 right-10 bg-blue-500 text-white text-sm uppercase py-1 px-2 rounded-full font-medium alert">
        {{$message}}
    </div>
@endif

