<div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow bg-slate-700 pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <x-desktop-sidebar.logo/>
        </div>
        <nav class="mt-5 flex-1 flex flex-col divide-y divide-slate-800 overflow-y-auto" aria-label="Sidebar">
            <div class="px-2 space-y-1">
                <x-desktop-sidebar.main-nav/>
            </div>
{{--            <div class="mt-6 pt-6">--}}
{{--                <div class="px-2 space-y-1">--}}
{{--                    <x-desktop-sidebar.secondary-nav/>--}}
{{--                </div>--}}
{{--            </div>--}}
        </nav>
    </div>
</div>
