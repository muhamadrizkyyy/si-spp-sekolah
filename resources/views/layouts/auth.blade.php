<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | SI SPP SEKOLAH</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--Replace with your tailwind.css once created-->
    @livewireStyles
</head>

<body>
    <main>
        <section class="flex items-center justify-center h-screen">
            {{ $slot }}
        </section>
    </main>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    @livewireScripts
</body>

</html>
