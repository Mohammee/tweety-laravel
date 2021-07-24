<x-master>
    <section class="px-8">
        <main class="container mx-auto">

            <div class="lg:flex lg:justify-between">

                <div class=" mb-4">
                    @include('_sidebar_links')
                </div>

                <div class="lg:flex-1 mb-8 lg:mx-10" style="max-width: 700px">

                    {{$slot}}

                </div>
                <div class="lg:w-1/5">
                    @include('_friends_list' , [
                    'follows' => auth()->check() ? auth()->user()->follows: []
                ])
                </div>

                <x-notify-message/>

            </div>

        </main>
    </section>
</x-master>
