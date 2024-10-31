<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 flex flex-col gap-4 divide-y">
        <x-chirp.chirp :$chirp/>
        @isset($parent)
            <a href="{{ route('chirps.show', $parent) }}" class="text-blue-500 pt-4">Back to parent</a>
        @endisset
        <form method="POST" action="{{ route('chirps.store', $chirp) }}" class="pt-4">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $chirp->id }}"/>
            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                placeholder="Write your reply here..."
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Reply') }}</x-primary-button>
            </div>
        </form>
        <section class="pt-4">
            <header>
                <h2 class="text-3xl font-bold">
                    Replies
                    @if(count($replies) != 0)
                        <span class="text-gray-600 text-xl">({{ count($replies) }})</span>
                    @endif
                </h2>
            </header>
            <br>
            @if(count($replies) != 0)
                <ul class="bg-white shadow-sm rounded-lg divide-y">
                    @foreach($replies as $reply)
                        <x-chirp.chirp :chirp="$reply" />
                    @endforeach
                </ul>
            @else
                <p>There are no replies yet.</p>
            @endif
        </section>
    </div>
</x-app-layout>
