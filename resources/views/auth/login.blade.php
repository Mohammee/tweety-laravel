<x-master>
    <div class="container  mx-6 py-6 px-4 mx-auto ">
        <div class="flex justify-center">
            <div class="w-96 py-8 px-10  bg-blue-200 rounded-2xl">
                <div class="flex justify-between">
                    <div class="font-bold text-xl mb-4">{{ __('Login') }}</div>

                    <div><a class="bg-blue-500 rounded-sm text-sm py-3 px-6 text-white uppercase "
                            href="{{route('register')}}">{{__('Register')}}</a></div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf


                        <label for="email"
                               class=" block text-xs text-gray-700 font-bold uppercase">{{ __('E-Mail Address') }}</label>

                        <div class="mb-2">
                            <input id="email" type="email"
                                   class="p-2 w-full mb-2 @error('email') border border-red-800 @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <p class="text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>



                        <label for="password"
                               class=" block text-xs text-gray-700 font-bold uppercase">{{ __('Password') }}</label>

                        <div class="col-md-6 mb-2">
                            <input id="password" type="password"
                                   class="p-2 w-full @error('password') border border-red-800 mb-2 @enderror" name="password"
                                   required autocomplete="current-password">

                            @error('password')
                            <p class="text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                            @enderror
                        </div>



                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>



                        <div class="md-8 offset-md-4">
                            <button type="submit" class="bg-blue-500 my-6 rounded-sm text-sm py-3 px-6 text-white uppercase" >
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="text-grey-700 text-sm ml-4" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                </form>
            </div>
        </div>
    </div>

</x-master>
