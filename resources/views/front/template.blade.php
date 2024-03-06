<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SmartBazar API Challenge')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <section class="w-1/2 m-auto">
        @yield('section')
    </section>

</body>
</html>
