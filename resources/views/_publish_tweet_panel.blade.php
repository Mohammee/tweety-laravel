<div class="border border-blue-500 rounded-2xl px-8 py-6 mb-8">

    <form method="POST" action="/tweets" enctype="multipart/form-data">
        @csrf

        <div class="flex">
            <input id="counter" type="text" disabled class="bg-white font-bold text-sm mb-1">
        </div>

        <div class="relative show_users">
            <textarea
                required
                autofocus
                placeholder="What's up doc?"
                class="w-full textarea h-20 "
                name="body" onkeyup="textCounter(this,'counter' , 255)"></textarea>
        </div>

        <div class="image-upload">
            <label class="text-blue-500" for="file-input" id="upload">
                <img src="{{asset('image/photo-upload.png')}}" alt="" class="h-8 w-8 mt-4">
            </label>

            <input id="file-input" type="file" name="image" style="display: none" />

             <div class="relative h-60 w-80 m-2"  style="display: none" id="show_image">
                 <img src="" alt="upload image" id="image_upload"
                 class="w-full h-full object-cover">

                 <button class="text-white absolute top-0 right-0 p-2 font-bold text-xl" id="remove_image">X</button>
             </div>
        </div>

        <hr class="mb-4 mt-2">

        <footer class="flex justify-between items-center">
            <a href="{{auth()->user()->profilePath()}}"><img src="{{auth()->user()->avatar}}"
                 alt="your avatar"
                 class="rounded-full mr-2" style="width: 40px; height: 40px"
            >
            </a>


            <x-publish-button></x-publish-button>

        </footer>

    </form>

    @error('body')
     <p class="text-red-400 mt-2 text-sm">{{$message}}</p>
    @enderror
</div>
