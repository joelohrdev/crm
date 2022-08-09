<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $client->name }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->phone_number }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->email_address }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        @if($client->status === 'active')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> Active </span>
        @else
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> Closed </span>
        @endif
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
        <a href="{{ route('client.show', $client) }}" class="text-slate-600 hover:text-slate-900">View<span class="sr-only">, {{ $client->name }}</span></a>
    </td>
</tr>
