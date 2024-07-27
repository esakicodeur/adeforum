<aside class="col-span-1 space-y-6 text-gray-600">

    <div class="p-4 space-y-4 bg-white shadow">
        <div class="pb-4 border-b border-gray-200">

            {{-- Start Discusson Button --}}
            <a href="{{ route('threads.create') }}" class="inline-flex items-center text-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-blue-500 border border-transparent rounded hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25" }}>
                {{ __('Démarrer une nouvelle discussion') }}
            </a>
        </div>

        <div class="pb-4 space-y-4">
            {{-- Subscribe to thread button --}}
            <x-buttons.secondary>
                {{ __('Abonnez-vous au fil de discussion') }}
            </x-buttons.secondary>
            <p class="text-sm text-gray-500">
                Abonnez-vous pour être averti chaque fois que de nouvelles discussions sont créées dans le forum "Catégorie Un".
            </p>
        </div>
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
