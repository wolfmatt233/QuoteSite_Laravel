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
                    @foreach ($quotes as $quote)
                        <div class="flex mt-5">
                            <img src="https://covers.openlibrary.org/b/id/{{ $quote->image }}-L.jpg" alt="image"
                                class="h-40 mr-4">
                            <div>
                                <div class="flex">
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

                                <form method="post" action="{{ route('delete', $quote->id) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-indigo-700 p-2 rounded-lg text-sm mt-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
