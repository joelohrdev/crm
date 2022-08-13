<div>
    <a wire:click="showDeleteModal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 hover:cursor-pointer">Delete</a>

    <form wire:submit.prevent="deleteClient" action="#" method="post">
        <x-jet-confirmation-modal wire:model.defer="showDeleteModal">
            <x-slot name="title">
                @if($client->contacts->count() === 0)
                    Are you sure you want to delete {{ $client->name }}
                @else
                    You need to delete all contacts associated with {{ $client->name }} before deleting this account.
                @endif
            </x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$set('showDeleteModal', false)">
                    Cancel
                </button>
                @if($client->contacts->count() === 0)
                <button type="submit" class="ml-5 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-tkd-blue-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Delete
                </button>
                @endif
            </x-slot>
        </x-jet-confirmation-modal>
    </form>
</div>
