<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown>

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Navigation</div>

    @if (Auth::user()->role=="test"||Auth::user()->role=="admin")
        <x-sidebar.sublink title="users" href="{{ route('users.index') }}"
            :active="request()->routeIs('users.index')" />
            
        <x-sidebar.sublink title="ref" href="{{ route('referants.index') }}"
            :active="request()->routeIs('referants.index')" />
       
        <x-sidebar.sublink title="Vehicules"  href="{{ route('cars') }}"
        :active="request()->routeIs('cars')" />
    @endif
    
    <x-sidebar.sublink title="test" href="{{ route('test') }}"
        :active="request()->routeIs('test')" />

</x-perfect-scrollbar>