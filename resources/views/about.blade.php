<x-app-layout>
    <x-slot name="header">
        <div class="max-w-5xl mx-auto my-2 ml-3">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('About Us') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Welcome to our About Us page. Here you can learn more about our mission, vision, and values.') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
