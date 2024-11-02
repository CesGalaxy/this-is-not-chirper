<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('chirps.store') }}" x-data="{ pollOptions: null }">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-input-error :messages="$errors->get('poll')" class="mt-2" />
            <template x-if="pollOptions != null">
                <ul class="grid md:grid-cols-2 gap-x-2">
                    <template x-for="(option, i) in pollOptions">
                        <li>
                            <x-text-input
                                x-model="pollOptions[i]"
                                x-bind:name="'pollOptions[' + i + ']'"
                                x-bind:placeholder="'{{ __('Option') }} ' + (i + 1)"
                                class="mt-2 w-full"
                            />
                        </li>
                    </template>
                </ul>
            </template>
            <nav class="grid grid-cols-2 sm:flex gap-4 mt-4">
                <x-ui.button.primary type="submit">{{ __('Chirp') }}</x-ui.button.primary>
                <x-ui.button.secondary
                    @click="if (Array.isArray(pollOptions)) { pollOptions = null } else { pollOptions = ['', ''] }"
                    x-text="Array.isArray(pollOptions) ? '{{ __('Normal message') }}' : '{{ __('Create a poll') }}'"
                >
                    {{ __('Create a poll') }}
                </x-ui.button.secondary>
                <template x-if="pollOptions != null">
                    <x-ui.button.secondary @click="pollOptions.push('')">
                        {{ __('Add option') }}
                    </x-ui.button.secondary>
                </template>
                <template x-if="pollOptions != null && pollOptions.length > 2">
                    <x-ui.button.danger @click="pollOptions.pop()">
                        {{ __('Remove last option') }}
                    </x-ui.button.danger>
                </template>
            </nav>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($chirps as $chirp)
                <x-chirp :$chirp />
            @endforeach
        </div>
    </div>
</x-app-layout>
