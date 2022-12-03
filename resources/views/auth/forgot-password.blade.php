<x-guest>
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full lg:w-2/3 h-auto m-8 flex flex-row justify-center">
            <div class="hidden lg:flex bg-white w-1/3 p-8 flex-col justify-center items-center">
                <img src="{{ asset('images/layout-images/logo.svg') }}" alt="Landing Page" class="w-full">
            </div>
            <div class="bg-white w-full lg:w-1/2 p-8 flex flex-col justify-between items-center">
                <h1 class="text-2xl font-bold text-center">{{ __('auth.forgot_password') }}</h1>

                <form method="POST" action="{{ route('auth.forgot-password') }}" class="w-full flex flex-col justify-center items-center text-center space-y-2">
                    @csrf
                    <a href="{{ route('auth.login') }}" class="text-green-400 hover:text-green-500 duration-500">Já possui uma conta? clique aqui.</a>
                    <div class="w-full flex flex-col justify-center items-center">
                        <label for="email" class="w-full text-left">{{ __('auth.email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-sm border border-gray-300 p-2">
                        @error('email')
                            <span class="text-red-500 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if(session('status'))
                            <span class="text-green-500 text-sm" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('elements.btn-send') }}</button>
                </form>
            </div>
        </div>
    </section>
</x-guest>
