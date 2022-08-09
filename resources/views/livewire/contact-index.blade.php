<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $contact->name }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $contact->phone_number }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $contact->email_address }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
       {{ $contact->client->name }}
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
        <a href="{{ route('contact.show', $contact) }}" class="text-tkd-blue-600 hover:text-tkd-blue-900">View<span class="sr-only">, {{ $contact->name }}</span></a>
    </td>
</tr>
