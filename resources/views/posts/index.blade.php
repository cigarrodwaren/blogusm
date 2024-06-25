<x-app-layout>
    <div class="container mx-auto py-8 mt-8 bg-white shadow-lg rounded-lg ">
       <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
       @foreach ($posts as $post) 
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">
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
            <x-nav-link :href="route('show', $post->id)" :active="request()->routeIs('posts')">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{__('Show more')}}</span>
            </x-nav-link>    
            </div>
        </div>
        </div>
       @endforeach 
       </div>
    </div>
</x-app-layout>