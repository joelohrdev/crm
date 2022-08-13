<div>
    <a wire:click="showModal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 hover:cursor-pointer">Edit</a>

    <form wire:submit.prevent="updateClient" action="#" method="post">
        <x-jet-dialog-modal wire:model.defer="showModal">
            <x-slot name="title">Edit {{ $client->name }}</x-slot>
            <x-slot name="content">
                {{ $this->form }}
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$set('showModal', false)">
                    Cancel
                </button>
                <button type="submit" class="ml-5 inline-flex items-center px-4 py-2 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Save
                </button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
