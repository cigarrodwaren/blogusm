<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 mt-8 bg-white shadow-lg rounded-lg">
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 p-6">
        <table>
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>{{__('Operations')}}</th>
            </thead>
            <tbody>
            @foreach ($categories as $category) 
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td class="text-center">
                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger">{{__('Remove')}}</button>
                </form>
                </td>
            </tbody>
            @endforeach 
        </table>
       </div>
       <div class="text-right">
            <x-nav-link :href="route('category.create')" :active="request()->routeIs('category')">
                <span class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 mr-2 mb-2">{{__('New Categories')}}</span>
            </x-nav-link>
        </div>
    </div>
</x-app-layout>