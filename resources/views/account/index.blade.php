<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accounts') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 mt-8">
        <div class="max-w-screen-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('#') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Name') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Email') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Created') }}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">{{ __('Is Admin') }}</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase">{{ __('Operations') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">@if ($user->is_admin == 1) {{__('Yes')}} @else {{__('No')}} @endif</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <form action="{{ route('account.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @if ($user->is_admin != 1)
                                        <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Remove') }}</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    <span class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 mr-2 mb-3">{{__('New User')}}</span>
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
