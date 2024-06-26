<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Tag') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{__('New Tag Form')}}</h2>
                    <form action="{{ route('tag.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name_tag" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{__('Name')}}:</label>
                            <input type="text" name="name_tag" id="name_tag" value="{{old('name_tag')}}" class="mt-1 block w-full px-3 py-2 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autocomplete="name_tag" placeholder="{{__('Enter tag name...')}}">
                            <x-input-error :messages="$errors->get('name_tag')" class="mt-2" />
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Create Tag') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>