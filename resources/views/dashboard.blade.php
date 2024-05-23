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
                        <div class="flex">
                            <img src="https://covers.openlibrary.org/b/id/{{ $quote->image }}-L.jpg" alt="image"
                                class="w-20 mr-4">
                            <div>
                                <div class="flex">
                                    <p>{{ $quote->title }}</p>
                                    &nbsp;
                                    <p>- {{ $quote->author }}</p>
                                </div>

                                <div class="p-3">
                                    <p class="font-cav text-xl">"{{ $quote->quote }}"</p>
                                    <p class="p-3">- {{ $quote->character }}</p>
                                </div>
                                <p>Page {{ $quote->page }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
