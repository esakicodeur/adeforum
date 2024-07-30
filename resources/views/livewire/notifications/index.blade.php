<div class="overflow-hidden border-b border-gray-200">
    @if (!$notifications->isEmpty())
    <table class="min-w-full">
        <thead class="bg-blue-500">
            <tr>
                <x-table.head>Message</x-table.head>
                <x-table.head>Date</x-table.head>
                <x-table.head class="text-center">Action</x-table.head>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 divide-solid">
            @foreach ($notifications as $notification)
            <tr>
                <x-table.data>
                    <div>
                        Une nouvelle réponse a été ajoutée à
                        <a href="{{ route('replies.replyAble', [$notification->data['replyable_id'], $notification->data['replyable_type']]) }}" class="ml-2 font-bold text-blue-500">
                            {{ $notification->data['replyable_subject'] }}
                        </a>
                    </div>
                </x-table.data>
                <x-table.data>
                    <div>
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                </x-table.data>
                <x-table.data class="text-center">
                    <x-jet-button wire:click="markAsRead('{{ $notification->id }}')">
                        {{ __('Marquer comme lu') }}
                    </x-jet-button>
                </x-table.data>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    Vous n'avez aucune notification non lue
    @endif
</div>
