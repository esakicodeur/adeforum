<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">discussion > créer</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        {{-- <x-user.avatar /> --}}
                    </div>

                    {{-- Create --}}
                    <div class="col-span-7 space-y-6">
                        <x-form action="#">
                            <div class="space-y-8">
                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Titre') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title')" required autofocus />
                                    <x-form.error for="title" />
                                </div>

                                {{-- Category --}}
                                <div>
                                    <x-form.label for="category" value="{{ __('Catégorie') }}" />
                                    <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">Choisir une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id() }}">{{ $category->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                                {{-- Tag --}}
                                <div>
                                    <x-form.label for="tag" value="{{ __('Tag') }}" />
                                    <select name="tag" id="tag" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <option value="">Choisir un tag</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id() }}">{{ $tag->name() }}</option>
                                        @endforeach
                                    </select>
                                    <x-form.error for="tag" />
                                </div>

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Description') }}" />
                                    <x-trix name="about" styling="shadow-inner bg-gray-100" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Créer') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-guest-layout>
