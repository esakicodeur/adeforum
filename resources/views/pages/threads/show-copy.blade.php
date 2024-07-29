<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <x-alerts.main />

            <small class="text-sm text-gray-400">Sujets > {{ $category->name() }} > {{ $thread->title() }}</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        <x-user.avatar :user="$thread->author()" />
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400">
                                {{ $thread->title() }}
                            </h2>
                            <p class="text-gray-500">
                                {!! $thread->body() !!}
                            </p>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <a href="" class="flex items-center space-x-2">
                                    <x-heroicon-o-heart class="w-5 h-5 text-red-300" />
                                    <span class="text-xs font-bold">148</span>
                                </a>
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Publié: {{ $thread->created_at->diffForHumans() }}
                            </div>


                            {{-- Reply --}}
                            <a href="" class="flex items-center space-x-2 text-gray-500">
                                <x-heroicon-o-reply class="w-5 h-5" />
                                <span class="text-sm">Répondre</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Replies --}}
            <div class="mt-6 space-y-5">
                <h2 class="mb-0 text-sm font-bold uppercase">Réponses</h2>
                <hr>

                @foreach ($thread->replies() as $reply)
                    <livewire:reply.update :reply="$reply" :key="$reply->id()" />

                    <div class="p-5 space-y-4 text-gray-500 bg-white border-l border-blue-300 shadow">
                        <div class="grid grid-cols-8">
                            {{-- Avatar --}}
                            <div class="col-span-1">
                                <x-user.avatar :user="$reply->author()" />
                            </div>

                            <div class="col-span-7 space-y-4">
                                <p>
                                    {!! $reply->body() !!}
                                </p>
                                <div class="flex justify-between">
                                    {{-- Likes --}}
                                    <div class="flex space-x-5 text-gray-500">
                                        <a href="" class="flex items-center space-x-2">
                                            <x-heroicon-o-heart class="w-5 h-5 text-red-300" />
                                            <span class="text-xs font-bold">30</span>
                                        </a>
                                    </div>

                                    {{-- Date Posted --}}
                                    <div class="flex items-center text-xs text-gray-500">
                                        <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                        A répondu : {{ $reply->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @auth
                <div class="p-5 space-y-4 bg-white shadow">
                    <h2 class="text-gray-500">Poster une réponse</h2>
                    <x-form action="{{ route('replies.store') }}">
                        <div>
                            <x-trix name="body" styling="bg-gray-100 shadow-inner h-40" />
                            <x-form.error for="body" />
                        </div>

                        <input type="hidden" name="replyable_id" value="{{ $thread->id() }}">
                        <input type="hidden" name="replyable_type" value="threads">

                        <div class="grid mt-4">
                            {{-- Button --}}
                            <x-buttons.primary class="justify-self-end">
                                {{ __('Commenter') }}
                            </x-buttons.primary>
                        </div>
                    </x-form>
                </div>
            @else
                <div class="flex justify-between p-4 text-gray-500 bg-blue-200 rounded">
                    <h2>Merci de vous connecter pour laisser un commentaire.</h2>
                    <a href="{{ route('login') }}">Se connecter</a>
                </div>
            @endauth
        </section>
    </main>
</x-guest-layout>
