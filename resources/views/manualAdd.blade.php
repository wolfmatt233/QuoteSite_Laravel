<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a Quote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Add Quote Manually') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Enter a quote from a book. Want to search for a book instead? Try it with the search option.") }}
                            </p>
                        </header>
                    
                        <form method="post" action="{{ route('addManual') }}" class="mt-6 space-y-6">
                            @csrf
                    
                            <div>
                                <x-input-label for="book" :value="__('Book')" />
                                <x-text-input placeholder="Book title" name="book" type="text" class="mt-1 block w-full" required autofocus autocomplete="book" />
                            </div>

                            <div>
                                <x-input-label for="author" :value="__('Author')" />
                                <x-text-input placeholder="Book author" name="book" type="text" class="mt-1 block w-full" required autofocus autocomplete="book" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Book Cover (url)')" />
                                <x-text-input id="image" name="image" type="text" class="mt-1 block w-full" required autofocus autocomplete="image" />
                            </div>

                            <div>
                                <x-input-label for="quote" :value="__('Quote')" />
                                <x-textarea-input id="quote" name="quote" type="text" class="mt-1 block w-full" required autofocus autocomplete="quote" />
                            </div>

                            <div>
                                <x-input-label for="page" :value="__('Page (optional)')" />
                                <x-text-input id="page" name="page" type="number" class="mt-1 block w-full" required autofocus autocomplete="page" />
                            </div>

                            <div>
                                <x-input-label for="character" :value="__('Character (optional)')" />
                                <x-text-input id="character" name="character" type="number" class="mt-1 block w-full" required autofocus autocomplete="character" />
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Add') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
