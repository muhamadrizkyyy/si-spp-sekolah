<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pages }} | SI SPP SEKOLAH</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    @isset($logo)
        <link rel="shortcut icon" href="{{ asset('storage/assets/logo/' . $logo) }}" type="image/png">
    @endisset
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <style>
        * {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="relative">
    {{-- NAVBAR --}}
    <nav class="bg-transparent z-50 absolute top-0 w-full p-2">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('landing-page') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/assets/logo/' . $logo) }}" class="h-5 md:h-8"
                    alt="Logo-{{ $identitas_web->nama_institusi }}" />
                <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap text-white">
                    {{ $identitas_web->nama_institusi }}
                </span>
            </a>
            {{-- SM VIEW --}}
            <div class="flex md:hidden md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @if ($siswaLogin)
                    <a href="{{ route('login.siswa') }}"
                        class="text-white bg-myBlue focus:ring-4 focus:ring-blue-300 font-medium rounded-md lg:rounded-xl text-sm px-2.5 lg:px-5 py-1.5 lg:py-3 md:ms-3.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <div class="flex gap-x-3">
                            <img src="{{ asset('storage/assets/bg/avatar.jpg') }}" alt="..."
                                class="w-8 rounded bg-gray-300 aspect-square">
                            <div class="profile flex flex-col text-left">
                                <span class="nama_siswa text-xs">{{ $siswaLogin->nama }}</span>
                                <span class="kelas text-xs">{{ $siswaLogin->kelas->kode_kelas }}</span>
                            </div>
                        </div>
                    </a>
                @else
                    <a href="{{ route('login.siswa') }}"
                        class="text-white bg-myBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Masuk
                    </a>
                @endif
                <button data-collapse-toggle="navbar-cta-sm" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta-sm" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:w-auto md:order-1" id="navbar-cta-sm">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#faq"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#service"
                            class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Service
                        </a>
                    </li>
                </ul>
            </div>

            {{-- MD VIEW --}}
            <div class="hidden md:inline-flex gap-x-5">
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    @if ($siswaLogin)
                        <a href="{{ route('login.siswa') }}"
                            class="text-white bg-myBlue focus:ring-4 focus:ring-blue-300 font-medium rounded lg:rounded-xl text-sm px-2.5 lg:px-4 py-1.5 lg:py-2.5 md:ms-3.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <div class="flex gap-x-3">
                                <img src="{{ asset('storage/assets/bg/avatar.jpg') }}" alt="..."
                                    class="w-8 rounded bg-gray-300 aspect-square">
                                <div class="profile flex flex-col text-left">
                                    <span class="nama_siswa text-xs">{{ $siswaLogin->nama }}</span>
                                    <span class="kelas text-xs">{{ $siswaLogin->kelas->kode_kelas }}</span>
                                </div>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('login.siswa') }}"
                            class="text-white bg-myBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Masuk
                        </a>
                    @endif
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#beranda"
                                class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent {{ Request::is('/#beranda') ? 'md:text-blue-700' : 'md:hover:bg-transparent md:hover:rounded-none md:hover:border-b md:hover:border-white' }} md:dark:text-blue-500"
                                aria-current="page">Beranda</a>
                        </li>
                        <li>
                            <a href="#faq"
                                class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:rounded-none md:hover:border-b md:hover:border-white md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#bantuan"
                                class="block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:rounded-none md:hover:border-b md:hover:border-white md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                Bantuan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    {{-- END NAVBAR --}}

    <section
        class="hero bg-myNavy h-screen flex-col relative bantuan text-center px-7 z-10 flex justify-center items-center text-white bg-cover bg-center
            before:content-['']
            before:absolute
            before:inset-0
            before:block
            before:bg-black
            before:opacity-65
            before:z-[-5]"
        id="hero" style="background-image: url('{{ asset('storage/assets/bg/hero-bg.png') }}')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 lg:h-32 w-20 lg:w-32 text-white" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M256 89.61L22.486 177.18L256 293.937l111.22-55.61l-104.337-31.9A16 16 0 0 1 256 208a16 16 0 0 1-16-16a16 16 0 0 1 16-16l-2.646 8.602l18.537 5.703l.008.056l27.354 8.365L455 246.645v12.146a16 16 0 0 0-7 13.21a16 16 0 0 0 7.293 13.406C448.01 312.932 448 375.383 448 400c16 10.395 16 10.775 32 0c0-24.614-.008-87.053-7.29-114.584A16 16 0 0 0 480 272a16 16 0 0 0-7-13.227v-25.42L413.676 215.1l75.838-37.92zM119.623 249L106.5 327.74c26.175 3.423 57.486 18.637 86.27 36.627c16.37 10.232 31.703 21.463 44.156 32.36c7.612 6.66 13.977 13.05 19.074 19.337c5.097-6.288 11.462-12.677 19.074-19.337c12.453-10.897 27.785-22.128 44.156-32.36c28.784-17.99 60.095-33.204 86.27-36.627L392.375 249h-6.25L256 314.063L125.873 249z" />
        </svg>
        <div class="welcome-text text-center mb-4 lg:mb-7 text-white">
            <h1 class="text-4xl lg:text-6xl font-bold lg:mb-5">Selamat Datang</h1>
            <h3 class="text-xl lg:text-3xl">Di Portal Pembayaran SPP {{ $identitas_web->nama_institusi }}</h3>
        </div>
        <div class="group-btn">
            <a href="{{ route('login.siswa') }}"
                class="text-white text-xs lg:text-lg hover:bg-white transition-all hover:text-myNavy border me-4 border-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Mulai Membayar
            </a>
            <a href="#bantuan"
                class="text-white text-xs lg:text-lg hover:bg-white group transition-all hover:text-myNavy border inline-flex items-center gap-x-1 lg:gap-x-3 border-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Butuh Bantuan?
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-3 lg:h-5 w-3 lg:w-5 group-hover:text-myNavy text-white" viewBox="0 0 14 14">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M6.987 1.5A3.18 3.18 0 0 0 3.75 4.628V9a1 1 0 0 1-1 1H1.5A1.5 1.5 0 0 1 0 8.5v-2A1.5 1.5 0 0 1 1.5 5h.75v-.39A4.68 4.68 0 0 1 7 0a4.68 4.68 0 0 1 4.75 4.61V5h.75A1.5 1.5 0 0 1 14 6.5v2a1.5 1.5 0 0 1-1.5 1.5h-.75v.5a2.75 2.75 0 0 1-2.44 2.733A1.5 1.5 0 0 1 8 14H6.5a1.5 1.5 0 0 1 0-3H8c.542 0 1.017.287 1.28.718a1.25 1.25 0 0 0 .97-1.218V4.627A3.18 3.18 0 0 0 6.987 1.5"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>

    <section class="faq px-7 md:px-12 py-8" id="faq">
        <h3 class="text-3xl text-balance font-bold text-center mb-6">FAQ (Frequently Asked Questions)</h3>
        <div class="lg:flex gap-x-5 justify-center">
            <!-- Gambar Full -->
            <div class="hidden lg:block img-faq w-[25%]">
                <img src="{{ asset('storage/assets/bg/faq-img.png') }}" class="object-cover rounded-xl"
                    alt="">
            </div>
            <!-- Konten FAQ -->
            <div class="content-group lg:w-1/2">
                <div id="accordion-collapse" data-accordion="collapse">
                    <h2 id="accordion-collapse-heading-1">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 hover:bg-blue-300 dark:hover:bg-gray-800 gap-3 bg-blue-200 dark:bg-gray-800 text-gray-900 dark:text-white"
                            data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                            aria-controls="accordion-collapse-body-1">
                            <span>Bagaimana cara membayar SPP secara online?</span>
                            <svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-1" class=""
                        aria-labelledby="accordion-collapse-heading-1">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Kami menyediakan opsi pembayaran SPP secara online melalui Portal Pembayaran SPP
                                SMK MAJAPAHIT.
                                Anda hanya perlu login ke akun Anda, pilih menu pembayaran SPP, masukkan jumlah yang
                                akan dibayarkan, dan ikuti langkah-langkah pembayaran hingga selesai.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-2">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-orange-300 bg-orange-200 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                            aria-controls="accordion-collapse-body-2">
                            <span>Apa saja metode pembayaran yang tersedia</span>
                            <svg data-accordion-icon="" class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-2" class="hidden"
                        aria-labelledby="accordion-collapse-heading-2">
                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Kami mendukung beberapa metode pembayaran seperti pembayaran via transfer bank dan juga
                                beberapa e-wallet yang telah didukung serta
                                dapat melakukan pembayaran langsung di counter SPP secara offline di sekolah. Informasi
                                detail dapat ditemukan di halaman pembayaran.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-3">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-300 bg-blue-200 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                            aria-controls="accordion-collapse-body-3">
                            <span>Bagaimana cara mengecek status pembayaran SPP</span>
                            <svg data-accordion-icon="" class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-3" class="hidden"
                        aria-labelledby="accordion-collapse-heading-3">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Anda dapat mengecek status pembayaran SPP melalui akun Anda di website sekolah. Masuk ke
                                menu Riwayat Pembayaran, di sana Anda bisa melihat detail status pembayaran yang telah
                                dilakukan.
                            </p>
                        </div>
                    </div>
                    <h2 id="accordion-collapse-heading-4">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-black border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-orange-300 bg-orange-200 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                            aria-controls="accordion-collapse-body-4">
                            <span>Bagaimana cara mengecek nomor NISN jika lupa</span>
                            <svg data-accordion-icon="" class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-4" class="hidden"
                        aria-labelledby="accordion-collapse-heading-4">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                Anda dapat mengecek nomor NISN di kartu pelajar, rapor atau melalui website
                                <a href="https://nisn.data.kemdikbud.go.id/" class="text-blue-600 underline">berikut
                                    ini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="bantuan"
        class="relative bantuan text-center px-7 z-10 h-60 flex justify-center items-center text-white bg-cover bg-center
            before:content-['']
            before:absolute
            before:inset-0
            before:block
            before:bg-gradient-to-r
            before:from-myBlueOcean
            before:via-myOrange
            before:to-myYellowSand
            before:opacity-70
            before:z-[-5]"
        style="background-image: url('{{ asset('storage/assets/bg/bantuan-bg.jpg') }}')">

        <div class="informasi">
            <h2 class="text-md sm:text-3xl font-semibold">
                Sampaikan Kendala Anda Seputar Pembayaran SPP
            </h2>
            <a href="https://wa.me/62{{ $no_telp }}?text=Halo,%20saya%20ingin%20bertanya..."
                class="inline-flex group gap-x-3 transition-all items-center mt-3 border-2 border-white py-2 rounded-lg px-2.5 hover:bg-white hover:text-myOrange">
                <span class="font-medium">Hubungi Kami</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white group-hover:text-myOrange"
                    viewBox="0 0 14 14">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M6.987 1.5A3.18 3.18 0 0 0 3.75 4.628V9a1 1 0 0 1-1 1H1.5A1.5 1.5 0 0 1 0 8.5v-2A1.5 1.5 0 0 1 1.5 5h.75v-.39A4.68 4.68 0 0 1 7 0a4.68 4.68 0 0 1 4.75 4.61V5h.75A1.5 1.5 0 0 1 14 6.5v2a1.5 1.5 0 0 1-1.5 1.5h-.75v.5a2.75 2.75 0 0 1-2.44 2.733A1.5 1.5 0 0 1 8 14H6.5a1.5 1.5 0 0 1 0-3H8c.542 0 1.017.287 1.28.718a1.25 1.25 0 0 0 .97-1.218V4.627A3.18 3.18 0 0 0 6.987 1.5"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </section>

    <footer class="bg-myNavy px-7 lg:px-12 pt-4 pb-7 lg:pb-0 dark:bg-gray-800">
        <div
            class="w-full lg:w-3/4 mx-auto max-w-screen-xl p-4 lg:flex lg:flex-col lg:items-center lg:justify-between">
            <div class="lg:flex lg:gap-x-7 lg:items-center">
                <img src="{{ asset('storage/assets/logo/' . $identitas_web->logo) }}"
                    class="w-20 place-self-center md:w-32" alt="">
                <div class="biodata text-white">
                    <h5 class="text-xl md:text-3xl text-center lg:text-left font-bold">
                        {{ $identitas_web->nama_institusi }}</h5>
                    <p class="motto text-base md:text-xl text-center lg:text-left font-medium">
                        "{{ $identitas_web->motto }}"
                    </p>
                    <p class="text-justify text-sm md:text-base lg:line-clamp-5">
                        {{ $identitas_web->deskripsi }}
                    </p>
                </div>
            </div>
            <div
                class="alamat w-full text-center text-xs md:text-base text-white whitespace-nowrap my-4 bg-gradient-to-r font-medium from-myOrange to-myYellowSand px-5 py-2 rounded-full">
                {{ $identitas_web->alamat }}, Jawa Timur Indonesia
            </div>
            <div class="sosmed flex gap-x-3 text-xs md:text-base items-center justify-center">
                @if ($identitas_web->usn_ig != '-')
                    <a class="instagram inline-flex gap-x-1 text-white hover:text-myYellowSand transition-all"
                        href="https://www.instagram.com/{{ $identitas_web->usn_ig }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 md:w-7" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
                        </svg>
                        <p>{{ '@' . $identitas_web->usn_ig }}</p>
                    </a>
                @endif
                @if ($identitas_web->usn_fb != '-')
                    <a class="facebook inline-flex gap-x-1 text-white hover:text-myYellowSand transition-all"
                        href="https://www.facebook.com/{{ $identitas_web->usn_fb }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 md:w-7" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
                        </svg>
                        <p>{{ $identitas_web->usn_fb }}</p>
                    </a>
                @endif
                @if ($identitas_web->usn_tiktok != '-')
                    <a class="tiktok inline-flex gap-x-1 text-white hover:text-myYellowSand transition-all"
                        href="https://www.tiktok.com/{{ $identitas_web->usn_tiktok }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 md:w-7" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M16.6 5.82s.51.5 0 0A4.28 4.28 0 0 1 15.54 3h-3.09v12.4a2.59 2.59 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48" />
                        </svg>
                        <p>{{ $identitas_web->usn_tiktok }}</p>
                    </a>
                @endif
            </div>
        </div>
    </footer>

    <div
        class="hidden bottom-7 right-7 z-50 backTop-btn rounded-full p-1 justify-center text-white items-center bg-gradient-to-r hover:bg-gradient-to-br transition-all opacity-0 from-myOrange to-myYellowSand w-fit">
        <a href="#hero">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="m5 15l7-7l7 7" />
            </svg>
        </a>
    </div>



    <script src="{{ asset('js/flowbite.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            function backTopBtn(height) {
                if (height >= 200) {
                    $(".backTop-btn").removeClass("hidden opacity-0");
                    $(".backTop-btn").addClass("fixed opacity-100");
                } else {
                    $(".backTop-btn").removeClass("fixed opacity-100");
                    $(".backTop-btn").addClass("hidden opacity-0");
                }
            }


            var height = $(document).scrollTop();
            backTopBtn(height);

            $(document).scroll(function() {
                height = $(document).scrollTop();
                console.log(height);
                backTopBtn(height);
            });

        });
    </script>

    @livewireScripts
</body>

</html>
