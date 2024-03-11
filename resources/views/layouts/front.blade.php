<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $header ?? 'Smartbazar API Challenge' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>
<body>



<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-row flex-wrap justify-between p-4">
        <div class="">
            <a href="{{ route('front.index') }}" class="flex items-center space-x-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" class="h-8" alt="Logo" />
                <span class="ml-2 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Smartbazar API Challenge</span>
            </a>
          </div>

          <div class="">
            <a href="{{ route('admin.index') }}" class="text-2xl font-semibold whitespace-nowrap dark:text-white">Admin Panel</a>
          </div>
    </div>
  </nav>
  
  
    <section class="p-4 w-11/12 m-auto">
        {{-- JQUERY --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        {{-- END JQUERY --}}

        {{ $slot }}
    </section>
    
</body>
</html>