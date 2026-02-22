<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-8">
            <h2 class="font-semibold text-2xl text-gray-800
            leading-tight">
                {{ __('Welcome to the Article Blog') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Explore a world of insightful articles on our blog. From technology trends to lifestyle tips, we cover a wide range of topics to keep you informed and inspired. Dive in and discover something new today!') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
