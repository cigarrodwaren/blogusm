<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a New Post') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{__('New Post Form')}}</h2>
                    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name_post" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{__('Name')}}:</label>
                            <input type="text" name="name_post" id="name_post" value="{{old('name_post')}}" class="mt-1 block w-full px-3 py-2 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autocomplete="name_post" placeholder="{{__('Enter title for the post...')}}">
                            
                        </div>
                        <div>
                            <label for="category_post" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{__('Category')}}:</label>
                            <select name="category_post" id="category_post" value="{{old('category_post')}}"class="mt-1 block w-full px-3 py-2 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option selected disabled>{{__('Select category')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{__('Message')}}:</label>
                            <textarea name="message" id="message" rows="4" value="{{old('message')}}" class="mt-1 block w-full px-3 py-2 border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required autocomplete="message" placeholder="{{ __("What's on your mind ...?") }}"></textarea>
                        </div>
                        <div>
                            <fieldset>
                                <legend class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{__('Choose your tags')}}:</legend>
                                @foreach ($tags as $tag)
                                <div class="mt-2">
                                    <input type="checkbox" id="{{$tag->id}}" name="tags[{{$tag->id}}]" class="rounded text-indigo-600">
                                    <label for="{{$tag->id}}" class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{$tag->name}}</label>
                                </div>
                                @endforeach
                            </fieldset>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Create Post') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>