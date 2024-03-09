<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="content bg-white shadow rounded p-4">
        <div class=" py-2">

            <a href="" class="mx-3 px-6 py-3.5 text-base font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center">
                {{ __('City') }}
            </a>

            <a href="" class="mx-3 px-6 py-3.5 text-base font-medium text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 rounded-lg text-center">
                {{ __('Rayon') }}
            </a>

            <a href="" class="mx-3 px-6 py-3.5 text-base font-medium text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 rounded-lg text-center">
                {{ __('Merchant') }}
            </a>

            <a href="" class="mx-3 px-6 py-3.5 text-base font-medium text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-center">
                {{ __('Shop') }}
            </a>

        </div>
    </div>
</x-app-layout>
