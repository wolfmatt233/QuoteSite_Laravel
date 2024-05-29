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
                                {{ __('Add Quote') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Enter a quote from a book. Can't find what you're looking for? Try it manually.") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('save') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <div>
                                    <x-input-label for="book" :value="__('Book')" />
                                    <div class="flex items-center">
                                        <x-text-input placeholder="Search here..." id="book_query" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="book" />
                                        <x-secondary-button class="ml-2 mt-1 h-10" id="book_search">Search</x-secondary-button>
                                    </div>
                                </div>
                                <select id="bookResults" id="book" name="book" autocomplete="book"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="" disabled selected>Select your option</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="quote" :value="__('Quote')" />
                                <x-textarea-input id="quote" name="quote" type="text"
                                    placeholder="Quote here..." class="mt-1 block w-full" required autofocus
                                    autocomplete="quote" />
                            </div>

                            <div>
                                <x-input-label for="character" :value="__('Character (optional)')" />
                                <x-text-input id="character" name="character" type="text"
                                    placeholder="Character name..." class="mt-1 block w-full" autofocus
                                    autocomplete="character" />
                            </div>

                            <div>
                                <x-input-label for="page" :value="__('Page (optional)')" />
                                <x-text-input id="page" name="page" type="number" placeholder="0"
                                    class="mt-1 block w-full" autofocus autocomplete="page" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Add Quote') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
