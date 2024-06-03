<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Quote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit Quote') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Edit the details of your quote.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('updateQuote', $quote->id) }}" class="mt-6 space-y-6">
                            @csrf @method('PUT')

                            <div>
                                <x-input-label for="book" :value="__('Book')" />
                                <x-text-input placeholder="Book title" name="book" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="book"
                                    value="{{ $quote->title }}" />
                            </div>

                            <div>
                                <x-input-label for="author" :value="__('Author')" />
                                <x-text-input placeholder="Book author" name="author" type="text"
                                    class="mt-1 block w-full" required autofocus autocomplete="author"
                                    value="{{ $quote->author }}" />
                            </div>

                            <div>
                                <x-input-label for="quote" :value="__('Quote')" />
                                <textarea rows="4" id="quote" name="quote" autocomplete="quote" required autofocus
                                    class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full'
                                    placeholder="Quote here...">{{ $quote->quote }}</textarea>

                            </div>

                            <div>
                                <x-input-label for="page" :value="__('Page (optional)')" />
                                <x-text-input id="page" name="page" type="number" class="mt-1 block w-full"
                                    autofocus autocomplete="page" placeholder="0" value="{{ $quote->page }}" />
                            </div>

                            @if ($quote->type == 'manual')
                                <div>
                                    <x-input-label for="image" :value="__('Book Cover (optional)')" />
                                    <x-text-input id="image" name="image" type="text" class="mt-1 block w-full"
                                        autofocus autocomplete="image" placeholder="www.image.net/image.png"
                                        value="{{ $quote->image }}" />
                                </div>
                            @endif

                            <div>
                                <x-input-label for="character" :value="__('Character (optional)')" />
                                <x-text-input id="character" name="character" type="text" class="mt-1 block w-full"
                                    autofocus autocomplete="character" placeholder="i.e., Gandalf, Frodo, Sam..."
                                    value="{{ $quote->character }}" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
