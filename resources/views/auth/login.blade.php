<x-guest title="Login">
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full lg:w-2/3 h-auto m-8 flex flex-row justify-center">
            <div class="hidden lg:flex bg-white w-1/3 p-8 flex-col justify-center items-center">
                <img src="{{ asset('images/layout-images/logo.svg') }}" alt="Landing Page" class="w-full">
            </div>
            <div class="bg-white w-full lg:w-1/2 p-8 flex flex-col justify-between items-center">
                <h1 class="text-2xl text-center font-bold">{{ __('auth.login') }}</h1>
                <div class="w-full flex flex-col">
                    <div class="w-full flex flex-col text-center lg:flex-row justify-between">
                        <a href="{{ route('auth.register') }}" class="duration-500">Não possui uma conta? <span class="text-green-500 hover:text-green-600 duration-500">clique aqui</span></a>
                        <a href="{{ route('auth.forgot-password') }}" class="duration-500">Esqueceu a senha? <span class="text-green-500 hover:text-green-600 duration-500">clique aqui</span></a>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('auth.authenticate') }}" class="w-full flex flex-col space-y-2">
                        @csrf
                        <div class="w-full flex flex-col justify-center items-center">
                            <label for="email" class="w-full text-left">{{ __('auth.email') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full rounded-sm border border-gray-300 p-2">
                            @error('email')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col justify-center items-center">
                            <label for="password" class="w-full text-left">{{ __('auth.passwrd') }}</label>
                            <input id="password" type="password" name="password" required class="w-full rounded-sm border border-gray-300 p-2">
                            @error('password')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('auth.login') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest>
