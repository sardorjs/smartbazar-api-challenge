<x-app-layout>
    <x-slot name="header">
        {{ __('Edit merchant') }} - {{ $merchant->name }}
    </x-slot>

    <div class="content bg-white shadow p-4 rounded">
        <form action="{{ route('admin.merchant.update', $merchant) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-row flex-wrap justify-start gap-4 items-end">
            @method('PUT')
            @csrf

            <div>
                <label for="name" 
                    class="block mb-2 text-sm font-medium text-gray-900">
                    {{ __('Name') }}
                </label>
                <input type="text" id="name" name="name"  placeholder="e.g: Tashkent" required value="{{ $merchant->name }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <div>
                <p class="mb-4 text-sm font-medium text-gray-900">{{ __('Status') }}</p>

                <label class="inline-flex items-center cursor-pointer">
                    <input name="status" type="checkbox" class="sr-only peer" {{ $merchant->status ? 'checked' : '' }}>
                    <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600"></div>
                </label>
            </div>  

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                {{ __('Submit') }}
            </button>
        </form>
    </div>
</x-app-layout>
