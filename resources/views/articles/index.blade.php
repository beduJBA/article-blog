<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-3">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ __('Articles') }}
                </h2>
                <a href="{{ route('articles.create') }}"
                    class="bg-blue-500 px-3 py-2.5 mr-5 text-white rounded-lg hover:bg-blue-600">New Article</a>
            </div>
        </div>
    </x-slot>
    <div>
    </div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6" id="articles">
                @foreach ($articles as $article)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-xl font-semibold">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-500 mt-2">by {{ $article->user->name }} <span
                                    class="ml-3">{{ $article->created_at }}</span></p>
                            <p class="mt-2">{{ Str::limit($article->content, 350) }}</p>
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-blue-500 hover:underline mt-4 inline-block">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $articles->links(data: ['scrollTo' => '#articles']) }}
            </div>
        </div>
    </div>
</x-app-layout>
