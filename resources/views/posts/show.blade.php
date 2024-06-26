<x-app-layout>
    <div class="min-h-screen container mx-auto py-16 px-40">
        <div class="grid grid-cols-1 gap-6">
            @foreach ($posts as $post)
                <div class="max-w-full rounded overflow-hidden shadow-lg">
                    <img class="w-full h-48 object-cover" src="{{ asset('img/card-top.jpg') }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl mb-2">{{ $post->name }}</div>
                        <div class="font-bold text-xl mb-2">{{ $post->extract }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $post->body }}
                        </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        @foreach ($post->tags as $tag)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    <div class="px-6 pt-4 pb-12 text-center">
                        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts')">
                            <span class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ __('Back') }}</span>
                        </x-nav-link>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>