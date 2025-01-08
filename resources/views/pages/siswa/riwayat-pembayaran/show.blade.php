@extends('layouts.mainSiswa')

@section('content')
    <section class="status-pembayaran flex justify-center py-10">
        <h3 class="text-xl font-bold">{{ $pembayaran->status }}</h3>
    </section>

    <section class="detail-pembayaran flex items-center flex-col">
        <div
            class="w-1/2 p-4 bg-gradient-to-r from-blue-500 to-sky-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Detail Pembayaran
            </h2>
            <div
                class="inline-flex w-full justify-between text-gray-500 px-5 py-3 bg-white border border-gray-200 rounded-lg">
                <span class="font-bold">
                    No Pembayaran
                </span>
                <span>
                    {{ $pembayaran->no_pembayaran }}
                </span>
            </div>
        </div>
        <div class="btn-group w-1/2 mt-2 text-right">
            @if ($belum_bayar)
                <button id="popup-btn"
                    class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    data-modal-target="popup-payment" data-modal-toggle="popup-payment">
                    Bayar SPP
                </button>
            @endif
            <a
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Kembali
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>

            {{-- Modal popup-payment --}}
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
                                <div class="p-0.5 md:p-1.5 mt-2 bg-white">
                                    <span class="font-bold">{{ $pembayaran->metodePembayaran->jenis_pembayaran }}</span>
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
                                class="text-white bg-red-600 font-medium rounded-full md:w-1/2 text-sm md:text-lg px-5 py-2.5 text-center">
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
