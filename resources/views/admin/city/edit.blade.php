<x-app-layout>
    <x-slot name="header">
        {{ __('Edit city') }} - {{ $city->name }}
    </x-slot>

    <div class="content bg-white shadow p-4 rounded">
        <form action="{{ route('admin.city.update', $city) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-row flex-wrap justify-start gap-4 items-end">
            @csrf

            <div>
                <label for="name" 
                    class="block mb-2 text-sm font-medium text-gray-900">
                    {{ __('Name') }}
                </label>
                <input type="text" id="name" name="name"  placeholder="e.g: Tashkent" required value="{{ $city->name }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                {{ __('Submit') }}
            </button>
        </form>
    </div>
</x-app-layout>
