<x-app-layout>
    <div class="min-h-screen container mx-auto py-16 px-8 sm:px-12 md:px-20 lg:px-32 xl:px-40">
        <div class="max-w-4xl mx-auto rounded-lg overflow-hidden shadow-lg">
            <img class="w-full h-auto" src="https://picsum.photos/800/600?random={{ 12965 + $post->id }}" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-2xl mb-2">{{ $post->name }}</div>
                <div class="font-bold text-xl mb-2">{{ $post->extract }}</div>
                <p class="text-gray-700 text-base">
                    {{ $post->body }}
                </p>
            </div>
            <div class="px-6 py-2">
                @foreach ($post->tags as $tag)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>
                @endforeach
            </div>
            <div class="px-6 py-4 text-center">
                <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                    <span class="inline-block bg-gray-200 rounded-full px-6 py-2 text-sm font-semibold text-gray-700">{{ __('Back') }}</span>
                </x-nav-link>
            </div>
            <div class="px-6 py-4 text-right">
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
</x-app-layout>
