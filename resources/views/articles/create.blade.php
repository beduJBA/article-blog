<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-3">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Create New Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <label for="title" class="sr-only">Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                placeholder="Enter article title">
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="15"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                        </div>
                        <div class="mb-4">
                            <input type="file" name="image" id="image"
                                class="mt-1 block border border-gray-300 rounded-md shadow-sm p-2">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 px-4 py-2 text-white rounded-lg hover:bg-blue-600">Create
                            Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
