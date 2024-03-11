<x-front-layout>
    <div class="my-4">

        <div class="two_blocks_left_heading_right_video flex flex-row flex-wrap justify-between">

            <div class="heading_block">
                <div class="heading">
                    <h1 class="text-2xl font-bold mb-2 ">Shops - {{ $count }}</h1>
                    <h2 class="text-xl font-bold mb-2 ">Shops that filtered by nearest based on User Coordinates</h2>
                    <h2 class="text-xl font-bold mb-2 ">Use Video Instruction of how to get latitude and longitude!</h2>
                </div>
                <div class="filter mb-4">
                    <form action="{{ route('front.index') }}"
                        class="flex flex-row flex-wrap gap-4 items-end">
                        <div>
                            <label for="latitude" 
                                class="block mb-2 text-sm font-medium text-gray-900">Latitude</label>
                            <input type="text" id="latitude" name="latitude" placeholder="e.g: 42.94783" value="{{ request()->has('latitude') ? request()->query('latitude') : ''}}" required 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
        
                        <div>
                            <label for="longitude" 
                                class="block mb-2 text-sm font-medium text-gray-900">Longitude</label>
                            <input type="text" id="longitude" name="longitude" placeholder="e.g: 69.864532" value="{{ request()->has('longitude') ? request()->query('longitude') : ''}}" required 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            {{ __('Sort') }}
                        </button>
        
                        <a href="{{ route('front.index') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                            {{ __('Clear') }}
                        </a>
                    </form>
                </div>
            </div>

            <div class="video flex flex-row gap-4">
                <div class="video_text">
                    <h2 class="font-bold text-2xl">Video<br>Instruction<br>of<br>How to Get<br>Coordinates?</h2>
                </div>

                <div class="video_content">
                    <video class="w-96" controls>
                        {{-- <source src="https://flowbite.com/docs/videos/flowbite.mp4" type="video/mp4"> --}}
                        <source src="{{ asset('videos/video-instruction.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
            </div>
        </div>

        



        <div class="data_section bg-white-400 shadow p-4 rounded">
            @if ($shops->isNotEmpty())
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>

                                <th scope="col" class="px-6 py-3">
                                    {{ __('Distance') }}
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
                                    {{ __('Registered at') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shops as $shop)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    
                                    <td class="px-6 py-4">
                                        @if ($shop->getAttribute('distance'))   
                                            <span class="text-lg">≈ {{ round($shop->distance) }} км.</span>
                                        @else
                                            Enter latitude and longitude!
                                        @endif
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
                                        {{ $shop->registered_at->format('d-m-Y H:i:s') }}
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
</x-front-layout>