@extends('layouts.mainSiswa')

@section('content')
    <section class="pembayaran px-7 md:px-12 mb-10 h-[65vh] md:h-full">
        <div class="greeting">
            <h1 class="text-2xl md:text-5xl font-bold text-myNavy">{{ $pages }}</h1>
            <p class="text-sm md:text-lg mt-1">
                Menu untuk mengelola riwayat pembayaran spp
            </p>
        </div>

        <div class="tabel-riwayat-pembayaran mt-4 w-full overflow-auto">
            <livewire:siswa.menu-riwayat.tabel-menu-riwayat-pembayaran :nisn="session('nisn')" />
        </div>
    </section>

    <section
        class="relative bantuan text-center px-7 z-10 h-60 flex justify-center items-center text-white bg-cover bg-center
            before:content-['']
            before:absolute
            before:inset-0
            before:block
            before:bg-gradient-to-r
            before:from-myOrange
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
@endsection
