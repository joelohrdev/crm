<div>
    <div class="bg-white p-5">
        {{ $client->address }}<br/>
        {{ $client->city }}, {{ $client->state }} {{ $client->postal_code }}<br><br>
        {{ $client->phone_number }}<br>
        {{ $client->email_address }}<br/>
        <button wire:click="showModal" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-tkd-blue-700 bg-tkd-blue-100 hover:bg-tkd-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tkd-blue-500">Edit</button>
        <br>
        <br>
        @foreach($client->contacts as $contact)
            {{ $contact->name }}, {{ $contact->position }}
        @endforeach
    </div>

    <form wire:submit.prevent="updateClient" action="#" method="post">
        <x-jet-dialog-modal wire:model.defer="showModal">
            <x-slot name="title">Edit {{ $client->name }}</x-slot>
            <x-slot name="content">
                <div class="mb-5">
                    <input wire:model.defer="name" x-ref="name" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Company Name" required>
                    @error('name')<span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-5">
                    <select wire:model.defer="status" x-ref="status" name="status" id="status" class="w-full bg-gray-100 text-sm rounded-lg border-none px-4 py-2">
                        <option value="active">Active</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>
                <div class="mb-5">
                    <input wire:model.defer="address" x-ref="address" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Address" >
                </div>
                <div class="mb-5">
                    <input wire:model.defer="city" x-ref="city" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="City">
                </div>
                <div class="mb-5">
                    <input wire:model.defer="state" x-ref="state" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="State">
                </div>
                <div class="mb-5">
                    <input wire:model.defer="postal_code" x-ref="postal_code" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Zip Code" >
                </div>
                <div class="mb-5">
                    <input wire:model.defer="phone_number" x-ref="phone_number" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Phone Number" >
                </div>
                <div class="mb-5">
                    <input wire:model.defer="email_address" x-ref="email_address" type="text" class="w-full text-sm bg-gray-100 border-none rounded-lg placeholder-gray-900 px-4 py-2" placeholder="Email Address" >
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" wire:click="$set('showModal', false)">
                    Cancel
                </button>
                <button type="submit" class="ml-5 inline-flex items-center px-4 py-2 bg-tkd-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-tkd-blue-700 active:bg-tkd-blue-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    Save
                </button>
            </x-slot>
        </x-jet-dialog-modal>
    </form>
</div>
