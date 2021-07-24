<x-master>

    <div class="container  mx-6 py-6 px-4 mx-auto">
        <div class="row flex justify-center ">

            <div class="w-96 pt-8 px-10  bg-blue-200 rounded-2xl">


                <div class="flex justify-between">

                    <div class="font-bold text-xl mb-4">{{ __('Register') }}</div>

                    <div><a class="bg-blue-500 my-6 rounded-sm text-sm py-3 px-6 uppercase text-white"
                            href="{{route('login')}}">{{__('Login')}}</a></div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username"
                               class="block text-xs text-gray-700 font-bold uppercase">{{ __('Username') }}</label>

                        <div class="col-md-6 ">
                            <input id="username" type="text"
                                   class="w-full py-2 mb-2 @error('username') border border-red-800 @enderror" name="username"
                                   value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                            <p class="text-red-600 text-xs" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>


                        <label for="name"
                               class="block text-xs text-gray-700 font-bold uppercase">{{ __('Name') }}</label>

                        <div class="col-md-6 ">
                            <input id="name" type="text"
                                   class="w-full py-2 mb-2 @error('name') border border-red-800 @enderror" name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <p class="text-red-600 text-xs" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>


                        <label for="email"
                               class="block text-xs text-gray-700 font-bold uppercase">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6 ">
                            <input id="email" type="email"
                                   class=" w-full  py-2 mb-2 @error('email') border border-red-800 @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <p class="text-red-600 text-xs" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>


                        <label for="password"
                               class="block text-xs text-gray-700 font-bold uppercase">{{ __('Password') }}</label>

                        <div class="col-md-6 ">
                            <input id="password" type="password"
                                   class="w-full py-2 mb-2 @error('password') border border-red-800 @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <p class="text-red-600 text-xs" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>


                        <label for="password-confirm"
                               class="block text-xs text-gray-700 font-bold uppercase">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6 ">
                            <input id="password-confirm" type="password" class="w-full py-2 mb-2"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                        class="bg-blue-500 my-6 rounded-sm text-sm py-3 px-6 uppercase text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-master>
