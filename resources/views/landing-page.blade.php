<x-signed>
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-full md:w-2/3 p-8 m-4 flex flex-col justify-center items-center text-center bg-white">
            <h1 class="text-3xl font-bold">{{ __('landing-page/index.welcome') }}</h1>
            <p class="text-xl">{{ __('landing-page/index.select-options') }}</p>
            <div class="w-full flex flex-col space-y-2 md:flex-row md:space-y-0 justify-around">
                <a href="{{ route('auth.login') }}" class="w-full md:w-1/3 p-2 rounded-sm hover:bg-slate-600 hover:text-white border border-slate-600 text-center duration-500">{{ __('landing-page/index.login') }}</a>
                <a href="{{ route('auth.register') }}" class="w-full md:w-1/3 p-2 rounded-sm hover:bg-slate-600 hover:text-white border border-slate-600 text-center duration-500">{{ __('landing-page/index.register') }}</a>
            </div>
        </div>
    </section>
</x-signed>
