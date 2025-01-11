<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($pages) ? $pages : 'Login Admin' }} | SI SPP SEKOLAH</title>
    <meta name="author" content="name">
    @isset($logo)
        <link rel="shortcut icon" href="{{ asset('storage/assets/logo/' . $logo) }}" type="image/png">
    @endisset
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--Replace with your tailwind.css once created-->
    @livewireStyles
</head>

<body>
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    @livewireScripts
</body>

</html>
