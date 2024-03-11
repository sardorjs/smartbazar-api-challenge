<x-app-layout>
    <x-slot name="header">
        {{ __('Add shop') }}
    </x-slot>

    <div class="content bg-white shadow p-4 rounded">
        <form action="{{ route('admin.shop.store') }}" method="POST" enctype="multipart/form-data"
            class="">
            @csrf

            {{-- Cities, Rayons, Merchants, Status --}}
            <div class="flex flex-row flex-wrap justify-start gap-4 items-end mb-4">
                {{-- City --}}
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
    
                {{-- Rayon --}}
                <div class="">
                    <label for="rayon_id" class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Select a rayon') }} <span class="text-red-500">*</span>
                    </label>
                    @if ($rayons->isNotEmpty())
                        <select id="rayon_id" name="rayon_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-6 pl-2.5 py-2.5">
                            <option selected disabled>{{ __('--Choose a rayon--') }}</option>
                            @foreach ($rayons as $rayon)
                                <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p class="p-4 text-base border-solid bg-slate-200">
                            {{ __('There are no rayons in the database.') }}
                        </p>
                    @endif
                </div>
    
                {{-- Merchant --}}
                <div class="">
                    <label for="merchant_id" class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Select a merchant') }} <span class="text-red-500">*</span>
                    </label>
                    @if ($merchants->isNotEmpty())
                        <select id="merchant_id" name="merchant_id" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-6 pl-2.5 py-2.5">
                            <option selected disabled>{{ __('--Choose a merchant--') }}</option>
                            @foreach ($merchants as $merchant)
                                <option value="{{ $merchant->id }}" {{ old('merchant_id') == $merchant->id ? 'selected' : '' }}>{{ $merchant->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <p class="p-4 text-base border-solid bg-slate-200">
                            {{ __('There are no merchants in the database.') }}
                        </p>
                    @endif
                </div>

                {{-- Status --}}
                <div>
                    <p class="mb-4 text-sm font-medium text-gray-900">{{ __('Status') }}</p>
    
                    <label class="inline-flex items-center cursor-pointer">
                        <input name="status" type="checkbox" class="sr-only peer" checked>
                        <div class="relative w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600"></div>
                    </label>
                </div>  

            </div>

            {{-- Name, Latitude, Longitude, Address, Phone--}}
            <div class="flex flex-row flex-wrap justify-start gap-4 items-end mb-4">
      
                {{-- Name --}}
                <div>
                    <label for="name" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Name') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name"  placeholder="e.g: Livestock Super Market" required value="{{ old('name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                {{-- Latitude --}}
                <div>
                    <label for="latitude" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Latitude') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="latitude" name="latitude"  placeholder="e.g: 41.309852" required value="{{ old('latitude') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                {{-- Longitude --}}
                <div>
                    <label for="longitude" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Longitude') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="longitude" name="longitude"  placeholder="e.g: 69.277093" required value="{{ old('longitude') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                
                {{-- Address --}}
                <div>
                    <label for="address" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Address') }}
                    </label>
                    <input type="text" id="address" name="address"  placeholder="e.g: Turkiston Street, 12А" value="{{ old('address') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Phone') }}
                    </label>
                    <input type="text" id="phone" name="phone"  placeholder="e.g: +998909991144" value="{{ old('phone') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                </div>

            </div>

            {{-- Schedule --}}
            <div class="flex flex-row flex-wrap justify-start gap-4 items-end mb-4">
                {{-- Schedule --}}
                <div>
                    <label for="schedule" 
                        class="block mb-2 text-sm font-medium text-gray-900">
                        {{ __('Schedule') }}
                    </label>
                    <textarea type="text" id="schedule" name="schedule"  placeholder="e.g: Monday: 09:00AM - 10:00PM ..."
                        rows="8" cols="64"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('schedule') ?? "Monday: 09:00AM - 10:00PM\nTuesday: 09:00AM - 10:00PM\nWednesday: 09:00AM - 10:00PM\nThursday: 09:00AM - 10:00PM\nFriday: 09:00AM - 10:00PM\nSaturday: Day off\nSunday: Day off" }}
                    </textarea>
                </div>
            </div>

            

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                {{ __('Submit') }}
            </button>
        </form>
    </div>

    {{-- Script - change Rayons from selecting a city --}}
    <script>
        $("#city_id").change(function() {
            var city_id = $('select#city_id option:selected').val();
            
            $.ajax({
                type: 'get',
                url: '/admin/get-rayons-by-city-id/' + city_id,
                success: function(data) {
                    var rayons = data; 

                    $('#rayon_id').html('').change(); 

                    // Check if rayons is empty
                    if (rayons.length === 0) {
                        // Append an option indicating no rayons are available for this city
                        $('#rayon_id').append('<option value="0">--no rayons for this city--</option>').change();
                    } else {
                        // If rayons are available, iterate and append each as an option
                        $.each(rayons, function(key, value) {
                            var findrayon = '<option value="'+value.id+'">'+value.name+'</option>';
                            $('#rayon_id').append(findrayon).change();
                        });
                    }
                }
            });
        });
    </script>
</x-app-layout>
