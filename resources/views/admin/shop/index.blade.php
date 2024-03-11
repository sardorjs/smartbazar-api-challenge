<x-app-layout>
    <x-slot name="header">
        {{ __('Shops') }} - {{ $count }}
    </x-slot>

    <div class="content">
        <div class="filter_section bg-white shadow p-4 rounded mb-4">
            <div class="flex flex-row flex-wrap justify-between items-end">
                <div class="filter_content">
                    <form action="{{ route('admin.shop.index') }}"
                        class="flex flex-row flex-wrap gap-4 items-end">
                        <div>
                            <label for="name" 
                                class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" name="name" placeholder="e.g: Market" value="{{ request()->has('name') ? request()->query('name') : ''}}" required 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            {{ __('Search') }}
                        </button>

                        <a href="{{ route('admin.shop.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            {{ __('Clear') }}
                        </a>
                    </form>
                </div>

                <div class="add_button_content pb-2">
                    <a href="{{ route('admin.shop.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3.5 focus:outline-none">
                        {{ __('Add shop') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="data_section bg-white shadow p-4 rounded">
            @if ($shops->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Action') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('City') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Rayon') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Merchant') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Created at') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="flex items-center px-6 py-4">
                                        <a href="{{ route('admin.shop.edit', $shop) }}" class="font-medium text-blue-600 hover:underline">{{ __('Edit') }}</a>
                                        <form action="{{ route('admin.shop.destroy', $shop) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure you want to remove this item?');"
                                                class="font-medium text-red-600 hover:underline ms-3">
                                                {{ __('Remove') }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($shop->status)   
                                            <p class="text-white bg-green-700 rounded-full px-4 py-2 text-center">Active</p>
                                        @else
                                            <p class="text-white bg-red-700 rounded-full px-4 py-2 text-center">Not active</p>
                                        @endif
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $shop->city->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $shop->rayon->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $shop->merchant->name }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $shop->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $shop->created_at->format('d-m-Y H:i:s') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination px-4 py-2">
                        {{ $shops->links() }}
                    </div>
                </div>

            @else
                <p class="p-4 text-base border-solid bg-slate-200">
                    {{ __('There are no shops in the database.') }}
                </p>
            @endif
            
        </div>

    </div>

</x-app-layout>
