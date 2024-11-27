<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bound Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Setting Bond Configuration.
                    {{-- Form --}}
                    <form method="post" action="{{ route('add-bound') }}"
                          class="space-y-6 grid grid-cols-12 gap-2">
                        @csrf
                        @method('PATCH')

                        <div class="col-span-4">
                            <x-input-label for="title" :value="__('Title')"/>
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                          required autofocus autocomplete="title"/>
                            <x-input-error class="mt-2" :messages="$errors->get('title')"/>
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="price" :value="__('Price')"/>
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full [appearance:textfield]"
                                          required autocomplete="price"/>
                            <x-input-error class="mt-2" :messages="$errors->get('price')"/>
                        </div>

                        <div class="col-span-2">
                            <x-input-label for="slots" :value="__('Number of Slots')"/>
                            <x-text-input id="slots" name="slots" type="text" class="mt-1 block w-full [appearance:textfield]"
                                          required autocomplete="slots"/>
                            <x-input-error class="mt-2" :messages="$errors->get('slots')"/>
                        </div>

                        <div class="flex items-center gap-4 col-span-12">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                             @if (session('status'))
                            <p x-data="{ show: true }" x-show="show" x-transition
                               x-init="setTimeout(() => show = false, 2000)"
                               class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                             @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
