<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Quotes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">    
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="get" action="{{ route('dashboard') }}" class="flex items-center">
                        <x-text-input placeholder="Search quotes..." name="search" id="quote_query" type="text"
                            class="mt-1 block w-full" required autofocus autocomplete="quote" />
                        <x-secondary-button class="ml-2 mt-1 h-10" type="submit"
                            id="quote_search">Search</x-secondary-button>
                    </form>
                    @forelse ($quotes as $quote)
                        <div class="flex mt-5">
                            @if ($quote->image && $quote->type == 'api')
                                <img src="https://covers.openlibrary.org/b/id/{{ $quote->image }}-L.jpg" alt="image"
                                    class="h-40 mr-4">
                            @elseif ($quote->image && $quote->type == 'manual')
                                <img src="{{ $quote->image }}" alt="image" class="h-40 mr-4">
                            @endif
                            <div>
                                <div class="flex flex-wrap">
                                    <p>{{ $quote->title }}</p>
                                    &nbsp;
                                    <p>- {{ $quote->author }}</p>
                                </div>

                                <div class="p-3">
                                    <p class="font-cav text-xl">"{{ $quote->quote }}"</p>
                                    @if ($quote->character)
                                        <p class="mt-2 ml-4">- {{ $quote->character }}</p>
                                    @endif
                                </div>

                                @if ($quote->page)
                                    <p>Page {{ $quote->page }}</p>
                                @endif

                                <div class="flex">
                                    <form class="mr-1" method="post" action="{{ route('delete', $quote->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                            class="bg-indigo-700 p-2 rounded-lg text-sm mt-2">Delete</button>
                                    </form>
                                    <form method="post" action="{{ route('edit', $quote->id) }}">
                                        @csrf
                                        <button type="submit"
                                            class="bg-indigo-700 p-2 rounded-lg text-sm mt-2">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No quotes found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
