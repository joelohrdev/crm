<div>
    <div class="bg-white p-5">
        {{ $contact->address }}<br/>
        {{ $contact->city }}, {{ $contact->state }} {{ $contact->postal_code }}<br><br>
        {{ $contact->phone_number }}<br>
        {{ $contact->email_address }}<br/>
        <button wire:click="showModal" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-tkd-blue-700 bg-tkd-blue-100 hover:bg-tkd-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tkd-blue-500">Edit</button>
    </div>
</div>
