@extends('layouts.mainSiswa')

@section('content')
    <section class="status-pembayaran flex flex-col items-center justify-center py-12 px-7 md:px-12">
        @if ($pembayaran->status == 'Success')
            <img src="{{ asset('storage/assets/Success.gif') }}" class="w-44" alt="">
        @endif
        @if ($pembayaran->status == 'Pending')
            <img src="{{ asset('storage/assets/Pending.gif') }}" class="w-44" alt="">
        @endif
        @if ($pembayaran->status == 'Failed')
            <img src="{{ asset('storage/assets/Failed.gif') }}" class="w-44" alt="">
        @endif
        <h2 class="text-2xl text-gray-600 mt-5 mb-2">Status Pembayaran</h2>
        <h1 class="text-4xl font-bold">
            {{ $pembayaran->status }}</h1>
    </section>

    <section class="detail-pembayaran flex items-center flex-col px-7 md:px-12 mb-10 h-screen">
        <div
            class="w-full md:w-1/2 p-6 bg-gradient-to-r from-blue-500 to-sky-300 border border-gray-200 rounded-t-3xl  dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-2xl font-bold text-white">
                Detail Pembayaran
            </h2>
            <div
                class="inline-flex flex-col md:flex-row gap-y-3 w-full justify-between shadow-inner text-gray-500 px-5 py-3 bg-white border border-gray-200 rounded-lg">
                <span class="font-bold">
                    No Pembayaran
                </span>
                <span>
                    {{ $pembayaran->no_pembayaran }}
                </span>
            </div>
            <div
                class="inline-flex flex-col md:flex-row gap-y-3 w-full justify-between text-gray-500 px-5 py-3 my-4 bg-white border border-gray-200 rounded-lg">
                <span class="font-bold">
                    Tanggal Pembayaran
                </span>
                <span>
                    {{ date_format(date_create($pembayaran->tgl_bayar), 'd M Y') }}
                </span>
            </div>
            <div
                class="inline-flex flex-col md:flex-row gap-y-3 w-full justify-between text-gray-500 px-5 py-3 bg-white border border-gray-200 rounded-lg">
                <span class="font-bold">
                    Metode Pembayaran
                </span>
                <span>
                    {{ $pembayaran->metodePembayaran->jenis_pembayaran }} | {{ $pembayaran->metodePembayaran->keterangan }}
                </span>
            </div>
        </div>

        <div class="inline-flex w-full md:w-1/2 px-7 py-4 -mt-2 justify-between rounded-b-3xl text-white bg-myNavy ">
            <span class="font-bold text-xl">Total</span>
            <span class="font-bold text-xl">{{ number_format($pembayaran->total_bayar, 0, ',', '.') }}</span>
        </div>

        <div class="btn-group w-full md:w-1/2 mt-2 text-right">
            @if ($belum_bayar)
                <button id="popup-btn"
                    class="px-3 py-2 text-sm font-medium text-center text-white bg-myNavy rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="popup-payment" data-modal-toggle="popup-payment">
                    Bayar SPP
                </button>
            @endif
            <a href="{{ route('riwayat-pembayaran') }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-myNavy rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Kembali
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>

            {{-- Modal popup-payment --}}
            @if ($belum_bayar)
                <div id="popup-payment" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-3xl shadow">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-sky-300 border p-4 md:p-5 rounded-t-3xl">
                                <div class="total-bayar text-left">
                                    <h3 class="text-sm md:text-xl font-bold text-white dark:text-white">
                                        Total Pembayaran
                                    </h3>
                                    <h2 class="text-2xl md:text-4xl font-bold text-white dark:text-white">
                                        {{ number_format(150000, 0, ',', '.') }}
                                    </h2>
                                </div>
                                <div class="metode-pembayaran">
                                    <h3 class="text-sm md:text-xl font-bold text-white dark:text-white">
                                        Metode Pembayaran
                                    </h3>
                                    <div class="p-0.5 justify-self-end md:p-1.5 mt-2 w-24 bg-white">
                                        <img src="{{ asset('storage/assets/pay-logo/' . $pembayaran->metodePembayaran->logo) }}"
                                            alt="logo-{{ $pembayaran->metodePembayaran->jenis_pembayaran }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 pb-0 space-y-4 text-center flex flex-col items-center">
                                <p class="text-sm md:text-md leading-relaxed text-gray-500 dark:text-gray-400">
                                    Lakukan pembayaran dengan metode pembayaran
                                    <span class="font-bold">{{ $pembayaran->metodePembayaran->jenis_pembayaran }}</span>
                                    <br class="hidden md:block"> ke nomor atau kode yang ada dibawah ini:
                                </p>

                                <h2 class="text-3xl font-bold">
                                    {{ $pembayaran->duitkuLogs->va_number }}
                                </h2>

                                <p class="text-sm md:text-md leading-relaxed text-gray-500 dark:text-gray-400">
                                    Pastikan nomor atau kode serta nominal yang diinputkan sesuai!
                                </p>

                                <div
                                    class="text-white bg-red-600 font-medium rounded-full w-auto text-sm md:text-lg px-5 py-2.5 text-center">
                                    Bayar Sebelum {{ $durasi }}
                                </div>
                                <!-- Modal footer -->
                                <div class="flex w-full items-center p-4 rounded-b-3xl">
                                    <button data-modal-hide="popup-payment" type="button"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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

@section('script')
    @if ($belum_bayar)
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $("#popup-btn").click();
                }, 10);
            })
        </script>
    @endif
@endsection
