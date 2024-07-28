<div class="px-2 py-1 text-xs text-gray-500 transition duration-100 bg-red-300 rounded hover:bg-red-400">
    <a wire:click="confirmThreadDeletion" wire:loading.attr="disabled" class="cursor-pointer">Supprimer</a>

    <x-jet-dialog-modal wire:model="confirmingThreadDeletion">
        <x-slot name="title">
            {{ __("Suppression du sujet") }}
        </x-slot>

        <x-slot name="content">
            {{ __("Etes-vous sûr de supprimer ce sujet ?") }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingThreadDeletion')" wire:loading.attr="disabled">
                {{ __("Annuler") }}
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="deleteThread" wire:loading.attr="disabled">
                {{ __("Supprimer") }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
