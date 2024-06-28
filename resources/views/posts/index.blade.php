<x-app-layout>
    <div class="container mx-auto py-8 mt-8 bg-white shadow-lg rounded-lg">
        @if ($posts->isEmpty())
            <div class="p-6 text-center">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('No posts found') }}</h2>
                <p class="text-gray-700 dark:text-gray-300">{{ __('There are no posts available at the moment.') }}</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}" class="block max-w-sm rounded overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="w-full">
                            <img class="w-full" src="https://picsum.photos/800/600?random={{ 12965 + $post->id }}" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $post->name }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $post->extract }}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                @foreach ($post->tags as $tag)
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
