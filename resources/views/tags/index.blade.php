<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 mt-8 ">
        <div class="max-w-screen-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <!--<th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">{{ __('#') }}</th>-->
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Name') }}</th>
                            <th class="px-4 py-2 text-center text-xs font-medium text-gray-600 uppercase">{{ __('Operations') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($tags as $tag)
                        <tr>
                            <!--<td class="px-4 py-3">{{ $tag->id }}</td>-->
                            <td class="px-4 py-3">{{ $tag->name }}</td>
                            <td class="px-4 py-3 text-center">
                                <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Remove') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <x-nav-link :href="route('tag.create')" :active="request()->routeIs('tag')">
                    <span class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 mr-2 mb-3">{{__('New Tag')}}</span>
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
