<a href="{{ route('dashboard') }}" class="{{ (request()->is('dashboard')) ? 'bg-slate-800' : '' }} hover:text-white hover:bg-slate-600 text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
    <!-- Heroicon name: outline/home -->
    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
    </svg>
    Home
</a>

<a href="{{ route('client.index') }}" class="{{ (request()->is('clients*')) ? 'bg-slate-800' : '' }} text-white hover:text-white hover:bg-slate-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
    <!-- Heroicon name: outline/home -->
    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
    </svg>
    Clients
</a>

<a href="{{ route('contact.index') }}" class="{{ (request()->is('contacts*')) ? 'bg-slate-800' : '' }} text-slate-100 hover:text-white hover:bg-slate-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
    <!-- Heroicon name: outline/clock -->
    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    Contacts
</a>

<a href="#" class="text-slate-100 hover:text-white hover:bg-slate-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
    <!-- Heroicon name: outline/scale -->
    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
    </svg>
    Servers
</a>

<a href="#" class="text-slate-100 hover:text-white hover:bg-slate-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
    <!-- Heroicon name: outline/credit-card -->
    <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
    </svg>
    Domains
</a>
