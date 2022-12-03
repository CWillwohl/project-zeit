<x-guest>
    <section class="w-full min-h-screen flex justify-center items-center">
    <div class="w-full lg:w-2/3 h-auto m-8 flex flex-row justify-center">
        <div class="hidden lg:flex bg-white w-1/2 p-8 flex-col justify-center items-center">
            <img src="{{ asset('images/layout-images/logo.svg') }}" alt="Landing Page" class="w-full">
        </div>
        <div class="bg-white w-full lg:w-1/2 p-8 flex flex-col justify-between items-center space-y-2">
            <h1 class="text-2xl font-bold text-center">{{ __('auth.register') }}</h1>
            <form method="POST" action="{{ route('auth.store') }}" class="w-full flex flex-col justify-center items-center text-center space-y-2">
                @csrf
                <a href="{{ route('auth.login') }}" class="text-green-400 hover:text-green-500 duration-500">Já possui uma conta? clique aqui.</a>
                <div class="w-full flex flex-col justify-center items-center">
                    <label for="name" class="w-full text-left">{{ __('auth.name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full rounded-sm border border-gray-300 p-2">
                    @error('name')
                        <span class="text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
                    <label for="cpf" class="w-full text-left">{{ __('auth.cpf') }}</label>
                    <input id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" required class="w-full rounded-sm border border-gray-300 p-2">
                    @error('cpf')
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
                <div class="w-full flex flex-col justify-center items-center">
                    <label for="password_confirmation" class="w-full text-left">{{ __('auth.confirm_passwrd') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full rounded-sm border border-gray-300 p-2">
                </div>
                <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('auth.register') }}</button>
        </div>
    </div>
    </section>
</x-guest>
