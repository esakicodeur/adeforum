<aside class="col-span-1 space-y-6 text-gray-600">

    <div class="p-4 space-y-4 bg-white shadow">
        <div class="pb-4 border-b border-gray-200">

            {{-- Start Discusson Button --}}
            <a href="{{ route('threads.create') }}" class="inline-flex items-center text-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-blue-500 border border-transparent rounded hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" }}>
                {{ __('Démarrer une nouvelle discussion') }}
            </a>
        </div>

        @auth
            @if (request()->routeIs('threads.show'))
                <div class="pb-4 space-y-4">

                    @can(App\Policies\ThreadPolicy::UNSUBSCRIBE, $thread)
                        {{-- Unsubscribe to thread button --}}
                        <x-links.main href="{{ route('threads.unsubscribe', [$thread->category->slug(), $thread->slug()]) }}">
                            {{ __('Se désabonner du fil de discussion') }}
                        </x-links.main>
                        <p class="text-sm text-gray-500">
                            Se désabonner de ce fil de discussion
                        </p>
                    @elsecan(App\Policies\ThreadPolicy::SUBSCRIBE, $thread)
                        {{-- Subscribe to thread button --}}
                        <x-links.main href="{{ route('threads.subscribe', [$thread->category->slug(), $thread->slug()]) }}">
                            {{ __('S\'abonner au fil de discussion') }}
                        </x-links.main>
                        <p class="text-sm text-gray-500">
                            Abonnez-vous à ce fil de discussion
                        </p>
                    @endcan
                </div>
            @endif
        @endauth
    </div>

    {{-- Categories --}}
    <div class="p-4 space-y-4 bg-white shadow">
        <div class="pb-4 mb-4 border-b border-gray-200">
            <h2 class="font-bold uppercase">Catégories</h2>
        </div>

        <ul class="space-y-4">
            <li>
                <a href="#" class="flex items-center justify-between">
                    Catégorie un
                    <span class="px-2 text-white bg-green-300 rounded">45</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-between">
                    Catégorie deux
                    <span class="px-2 text-white bg-green-300 rounded">45</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-between">
                    Catégorie trois
                    <span class="px-2 text-white bg-green-300 rounded">45</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-between">
                    Catégorie quatre
                    <span class="px-2 text-white bg-green-300 rounded">45</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center justify-between">
                    Catégorie cinq
                    <span class="px-2 text-white bg-green-300 rounded">45</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="p-4 space-y-4 bg-white shadow">
        <ul class="space-y-4 text-gray-500">
            <li>
                <a href="#" class="flex items-center space-x-2">
                    <x-heroicon-s-star class="w-5 h-5 text-yellow-500" />
                    <span>Populaire cette semaine</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2">
                    <x-heroicon-s-fire class="w-5 h-5 text-red-600" />
                    <span>Populaire de tous les temps</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2">
                    <x-heroicon-s-chat class="w-5 h-5 text-blue-400" />
                    <span>Pas encore de réponses</span>
                </a>
            </li>
        </ul>
    </div>


</aside>
