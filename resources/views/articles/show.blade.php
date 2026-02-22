<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-3">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Article Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-4 py-6">
                <img src="{{ asset('storage/' . $article->image_path) }}" alt="">
                <div class="p-12 text-gray-900">
                    <h3 class="text-3xl font-bold mb-12">{{ $article->title }}</h3>
                    <p class="text-sm text-gray-500 mb-4">Published on {{ $article->created_at->format('F j, Y') }}</p>
                    <p class="mb-4 text-gray-900">{{ $article->content }}</p>
                    <p class="text-sm text-gray-500">{{ $article->user->name }}</p>
                </div>
            </div>
            <div class="mx-auto max-w-5xl mt-10 space-x-4 text-center">
                @auth
                    <a href="{{ route('articles.edit', $article->slug) }}"
                        class="bg-blue-500 px-3 py-2.5 text-white rounded-lg hover:bg-blue-600">Edit Article</a>
                    <form action="{{ route('articles.destroy', $article->slug) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 px-3 py-2.5 text-white rounded-lg hover:bg-red-600">Delete
                            Article</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
