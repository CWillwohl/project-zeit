<x-guest>
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full lg:w-2/3 h-auto m-8 flex flex-row justify-center">
            <div class="hidden lg:flex bg-white w-1/3 p-8 flex-col justify-center items-center">
                <img src="{{ asset('images/layout-images/logo.svg') }}" alt="Landing Page" class="w-full">
            </div>
            <div class="bg-white w-full lg:w-1/2 p-8 flex flex-col justify-evenly items-center">
                <h1 class="text-2xl font-bold text-center">{{ __('auth.verify_email') }}</h1>
                <div class="w-full flex flex-col text-center">
                    <p class="text-base">{{ __('auth.send_mail_description') }}</p>
                    @if(session('status') == 'success')
                        <div class="w-full text-center my-2">
                            <div class="text-green-500">
                                {{ __('auth.verification_link_sent') }}
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('auth.resend-verification-email') }}" class="w-full flex flex-col justify-center items-center space-y-2">
                        @csrf
                        <button type="submit" class="w-full bg-green-400 hover:bg-green-500 shadow-md duration-500 text-white rounded-sm p-2 mt-4">{{ __('auth.re-send_mail') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest>
