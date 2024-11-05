<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('header', __('Marketplace'))
        </h2>
    </x-slot>

    <nav class="bg-white border-t border-t-gray-100 shadow">
        <ul class="max-w-7xl mx-auto flex items-stretch gap-4 px-4 sm:px-6 lg:px-8">
            <li>
                <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                    {{ __('Explore') }}
                </x-nav-link>
            </li>
            <i class="flex-grow"></i>
            <li class="h-full">
                <x-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')">
                    {{ __('Create') }}
                </x-nav-link>
            </li>
        </ul>
    </nav>

    @yield('content')
</x-app-layout>
