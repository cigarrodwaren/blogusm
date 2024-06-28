<x-app-layout>
    <div class="container mx-auto py-8 mt-8 bg-white shadow-lg rounded-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
            @foreach ($posts as $post)
                <a href="{{ route('posts.show', $post->id) }}" class="block max-w-sm rounded overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-full">
                        <img class="w-full" src="https://picsum.photos/800/600?random={{ 12965 + $post->id}}" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $post->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $post->extract }}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            @foreach ($post->tags as $tag)
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{$tag->name}}</span>
                            @endforeach
                            <div class="text-right">
                                <!-- Remove the 'Show more' link -->
                                @if (auth()->id() === $post->user_id)
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600 hover:text-red-900 inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold">{{ __('Remove') }}</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
