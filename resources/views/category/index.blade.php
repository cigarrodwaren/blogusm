<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Categories') }}
            </h2>
            <div>
                <x-nav-link :href="route('category.create')" :active="request()->routeIs('category')">
                    <div class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 shadow-md">
                        {{__('New Category')}}
                    </div>
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto py-8 mt-8">
        <div class="max-w-screen-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <!--<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('#') }}</th>-->
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Name') }}</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase">{{ __('Operations') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $category)
                        <tr>
                            <!--<td class="px-6 py-4 whitespace-nowrap">{{ $category->id }}</td>-->
                            <td class="px-6 py-4 whitespace-nowrap">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
        </div>
    </div>
</x-app-layout>
