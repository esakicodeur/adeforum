<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Catégories') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-blue-500">
                    <tr>
                        <x-table.head>Id</x-table.head>
                        <x-table.head>Nom</x-table.head>
                        <x-table.head>Slug</x-table.head>
                        <x-table.head class="text-center">Créé à</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    <tr>
                        <x-table.data>
                            <div>1</div>
                        </x-table.data>
                        <x-table.data>
                            <div>Category Name</div>
                        </x-table.data>
                        <x-table.data>
                            <div>category-name</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">2005-14-06</div>
                        </x-table.data>
                    </tr>
                </tbody>

            </table>
        </div>
    </section>


</x-app-layout>
