<x-app-layout>
    <x-slot name="header">
        {{ __('Add rayon') }}
    </x-slot>

    <div class="content bg-white shadow p-4 rounded">
        <form action="{{ route('admin.rayon.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-row flex-wrap justify-start gap-4 items-end">
            @csrf

            <div class="">
                <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900">
                    {{ __('Select a city') }} <span class="text-red-500">*</span>
                </label>
                @if ($cities->isNotEmpty())
                    <select id="city_id" name="city_id" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-6 pl-2.5 py-2.5">
                        <option selected disabled>{{ __('--Choose a city--') }}</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                @else
                    <p class="p-4 text-base border-solid bg-slate-200">
                        {{ __('There are no cities in the database.') }}
                    </p>
                @endif
            </div>
  
            <div>
                <label for="name" 
                    class="block mb-2 text-sm font-medium text-gray-900">
                    {{ __('Name') }} <span class="text-red-500">*</span>
                </label>
                <input type="text" id="name" name="name"  placeholder="e.g: Mirabad district" required value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                {{ __('Submit') }}
            </button>
        </form>
    </div>
</x-app-layout>
