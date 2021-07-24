<x-master>

@section('content')
        <div class="container  mx-6 py-6 px-4 mx-auto ">
            <div class="flex justify-center">
                <div class="w-96 py-8 px-10  bg-blue-200 rounded-2xl">
            <div class="card">
                <div class="text-gray-600 uppercase font-bold ">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           <p class="text-red-600 text-sm "> {{ session('status') }} </p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row mt-4">
                            <label for="email"  class=" mb-1text-md font-bold text-gray-700 uppercase">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="p-2 w-full @error('email') border border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-red-600 text-sm">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-blue-500  px-3 py-2 mt-3 text-white uppercase rounded-lg">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-master>
