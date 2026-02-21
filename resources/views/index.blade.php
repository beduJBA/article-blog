<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to the Article Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Explore a world of insightful articles on our blog. From technology trends to lifestyle tips, we cover a wide range of topics to keep you informed and inspired. Dive in and discover something new today!') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
