<div>
    <button wire:click="showDeleteModal" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>

    <form wire:submit.prevent="deleteContact" action="#" method="post">
        <x-jet-confirmation-modal wire:model.defer="showDeleteModal">
            <x-slot name="title">Are you sure you want to delete {{ $contact->name }}</x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$set('showDeleteModal', false)">
                    Cancel
                </button>
                <button type="submit" class="ml-5 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-tkd-blue-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Delete
                </button>
            </x-slot>
        </x-jet-confirmation-modal>
    </form>
</div>
