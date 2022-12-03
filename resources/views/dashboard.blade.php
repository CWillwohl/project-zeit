<x-signed>
    <section class="w-full min-h-screen flex justify-center items-center">
        <div class="w-2/3 p-8 m-4 flex flex-col justify-center items-center bg-white">
            <h1 class="text-3xl font-bold">{{ __('dashboard/index.welcome') }}</h1>
            <p class="text-xl">{{ __('dashboard/index.logged') }}</p>
            <form action="{{ route('auth.logout') }}" method="post" class="w-full flex justify-center items-center">
            @csrf
                <button type="submit" class="w-1/2 p-2 text-center bg-red-500 hover:bg-red-600 text-white rounded-sm duration-500">
                    {{ __('dashboard/index.logout') }}
                </button>
            </form>
        </div>
    </section>

    
</x-signed>
