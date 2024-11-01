<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <x-ui.button.primary>Button</x-ui.button.primary>
                <x-ui.button.secondary>Button</x-ui.button.secondary>
                <x-ui.button.danger>Button</x-ui.button.danger>
            </div>
        </div>
    </div>
</x-app-layout>
