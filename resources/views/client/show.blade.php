<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clients : <span class="text-tkd-blue-700">{{ $client->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <livewire:client-show :client="$client"/>
            </div>
        </div>
    </div>
</x-app-layout>