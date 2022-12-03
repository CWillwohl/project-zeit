<x-guest title="Login">
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full lg:w-2/3 h-auto m-8 flex flex-row justify-center">
            <div class="hidden lg:flex bg-white w-1/3 p-8 flex-col justify-center items-center">
                <img src="{{ asset('images/layout-images/logo.svg') }}" alt="Landing Page" class="w-full">
            </div>
            <div class="bg-white w-full lg:w-1/2 p-8 flex flex-col justify-between items-center">

                <h1 class="text-2xl font-bold text-center">{{ __('auth.reset_password') }}</h1>
                <div class="w-full flex-col">
                    <form method="POST" action="{{ route('auth.update-password') }}" class="w-full flex flex-col justify-center items-center space-y-2">
                        @csrf
                        {{-- Dados vindo do Controllador para fazer a alteração de senha. --}}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value={{ $email }}>

                        <div class="w-full flex flex-col justify-center items-center">
                            <label for="email" class="w-full text-left">{{ __('auth.email') }}</label>
                            <input id="email" value="{{ $email }}" disabled class="w-full rounded-sm border border-gray-300 p-2 disabled:opacity-70">
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
                        <div class="w-full flex flex-col justify-center items-center">
                            <label for="password_confirmation" class="w-full text-left">{{ __('auth.confirm_passwrd') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full rounded-sm border border-gray-300 p-2">
                        </div>
                        <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('elements.btn-save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest>
