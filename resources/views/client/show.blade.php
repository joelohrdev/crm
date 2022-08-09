<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Clients : <span class="text-tkd-blue-700">{{ $client->name }}</span>
                </h2>
                <livewire:client-delete
                    :key="$client->id"
                    :client="$client"
                />
            </div>
            <div>
                <livewire:client-show :client="$client"/>
            </div>
        </div>
    </div>
</x-app-layout>
