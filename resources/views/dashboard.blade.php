<x-app-layout>
    <x-slot name="header">
        <h2 class="w-full flex justify-center font-semibold text-xl leading-tight">
            <div class="flex flex-row items-center space-x-2">
                <a href="{{ route('dashboard') }}" class="flex flex-row items-center space-x-2">
                    <img src="{{ asset('favicon2.png') }}" alt="Logo" class="block h-12 w-auto"/>
                    <div class="leading-tight flex flex-row">
                        <p class="text-6xl font-semibold text-yellow-500">onstru</p>
                        <p class="text-6xl font-semibold text-black">Vial</p>
                    </div>
                </a>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
