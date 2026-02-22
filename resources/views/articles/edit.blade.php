<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-3">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Edit Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('articles.update', $article->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-6 text-gray-900">
                        <div class="mb-4">
                            <label for="title" class="sr-only">Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                value="{{ old('title', $article->title) }}">
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="15"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('content', $article->content) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Featured Image</label>

                            <!-- Image Preview Container -->
                            @if ($article->image_path)
                                <div class="mt-3 mb-4">
                                    <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                                    <div class="relative inline-block">
                                        <img id="preview-image" src="{{ Storage::url($article->image_path) }}"
                                            alt="{{ $article->title }}"
                                            class="h-40 w-60 object-cover rounded-lg shadow-sm border border-gray-200">
                                    </div>
                                    <label class="mt-3 flex items-center gap-2">
                                        <input type="checkbox" name="delete_image" value="1"
                                            class="rounded border-gray-300">
                                        <span class="text-sm text-gray-700">Delete current image</span>
                                    </label>
                                </div>
                            @else
                                <div class="mt-3 mb-4 hidden" id="preview-container">
                                    <p class="text-sm text-gray-600 mb-2">Image Preview:</p>
                                    <div class="relative inline-block">
                                        <img id="preview-image" src="" alt="Preview"
                                            class="h-40 w-60 object-cover rounded-lg shadow-sm border border-gray-200">
                                    </div>
                                </div>
                            @endif

                            <!-- Upload New Image -->
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 mb-2">
                                    {{ $article->image_path ? 'Replace image:' : 'Upload image:' }}</p>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 cursor-pointer">
                                <p class="text-xs text-gray-500 mt-1">Supported formats: JPG, PNG, GIF (Max 2MB)</p>
                            </div>

                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <script>
                            const imageInput = document.getElementById('image');
                            const previewImage = document.getElementById('preview-image');
                            const previewContainer = document.getElementById('preview-container');

                            imageInput.addEventListener('change', function(e) {
                                const file = e.target.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(event) {
                                        previewImage.src = event.target.result;
                                        // Show preview container if it was hidden
                                        if (previewContainer) {
                                            previewContainer.classList.remove('hidden');
                                        }
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        </script>
                        <div class="space-x-2">
                            <button type="submit"
                                class="bg-blue-500 px-4 py-2 text-white rounded-lg hover:bg-blue-600">Update
                                Article</button>
                            <a href="{{ route('articles.index') }}"
                                class="bg-slate-500 px-3 py-2.5 text-white rounded-lg hover:bg-slate-600">Back to
                                Articles</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
