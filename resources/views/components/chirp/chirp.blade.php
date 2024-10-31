@props([
    'chirp',
    'replies'
])

<section class="p-6 flex space-x-2">
    <a href="{{ route('chirps.show', $chirp) }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
    </a>
    <div class="flex-1">
        <header class="flex justify-between items-center">
            <div>
                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                @unless ($chirp->created_at->eq($chirp->updated_at))
                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                @endunless
            </div>
            <nav class="flex items-start gap-4">
                @isset($replies)
                    <small class="ml-2 text-sm text-gray-600">{{$replies}} {{$replies == 1 ? __('reply') : __('$replies')}}</small>
                @endisset
                <a href="{{ route('chirps.show', $chirp) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M8 9h8" />
                        <path d="M8 13h6" />
                        <path d="M12.01 18.594l-4.01 2.406v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v5.5" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                    </svg>
                </a>
                @if ($chirp->user->is(auth()->user()))
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                {{ __('Edit') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                @csrf
                                @method('delete')
                                <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </nav>
        </header>
        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
    </div>
</section>
