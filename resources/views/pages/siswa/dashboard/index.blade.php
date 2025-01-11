@extends('layouts.mainSiswa')

@section('content')
    <section class="counting-payment px-7 md:px-12">
        <div class="greeting">
            <h1 class="text-2xl md:text-5xl font-bold text-myNavy">Halo, {{ session('nama') }}</h1>
            <p class="text-sm md:text-lg mt-1">Selamat datang kembali, ini rekapitulasi pembayaran spp kamu di
                {{ $identitas_web->nama_institusi }}</p>
        </div>
        <div class="count-payment flex flex-col gap-5 md:flex-row justify-between mt-7">
            <a href="{{ route('pembayaran.siswa') }}"
                class="flex items-center bg-gradient-to-r px-5 py-7 gap-x-7 from-myOrange to-myYellowSand hover:bg-gradient-to-br rounded-3xl shadow md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="icon bg-white p-4 rounded-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-myOrange h-14 w-14" viewBox="0 0 2048 2048">
                        <path fill="currentColor"
                            d="M2048 384v1280H128v-256H0V256h1792v128zm-512 0q0 27 10 50t27 40t41 28t50 10V384zM128 512q27 0 50-10t40-27t28-41t10-50H128zm0 512q53 0 99 20t82 55t55 81t20 100h1024q0-53 20-99t55-82t81-55t100-20V640q-53 0-99-20t-82-55t-55-81t-20-100H384q0 53-20 99t-55 82t-81 55t-100 20zm1536 128q-27 0-50 10t-40 27t-28 41t-10 50h128zM128 1280h128q0-27-10-50t-27-40t-41-28t-50-10zm1792-768h-128v896H256v128h1664zM448 896q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m896 0q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m-448 256q-53 0-99-20t-82-55t-55-81t-20-100V768q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100v128q0 53-20 99t-55 82t-81 55t-100 20M768 896q0 27 10 50t27 40t41 28t50 10q27 0 50-10t40-27t28-41t10-50V768q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50z" />
                    </svg>
                </div>
                <div class="info flex flex-col md:gap-3 lg:items-center lg:flex-row">
                    <h5 class="text-lg  lg:text-2xl font-medium text-white">
                        SPP Terbayar Tahun {{ $siswaLogin->thn_ajaran }}
                    </h5>
                    <span class="text-2xl md:text-3xl lg:text-5xl text-white font-bold">
                        {{ count($byr_thn_ajaran) }}/12
                    </span>
                </div>

                {{-- <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div> --}}
            </a>
            <a href="{{ route('riwayat-pembayaran') }}"
                class="flex items-center bg-gradient-to-r px-5 py-7 gap-x-7 from-myOrange to-myYellowSand hover:bg-gradient-to-br rounded-3xl shadow md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="icon bg-white p-4 rounded-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-myOrange h-16 w-16" viewBox="0 0 20 20">
                        <path fill="currentColor"
                            d="M2.854 2.146a.5.5 0 1 0-.708.708l1.16 1.159A1.5 1.5 0 0 0 2 5.5v7A1.5 1.5 0 0 0 3.5 14h9.793l1 1H4.085A1.5 1.5 0 0 0 5.5 16h9q.37 0 .719-.074l1.927 1.928a.5.5 0 0 0 .708-.708zM12 12.707V13H6v-1a2 2 0 0 0-2-2H3V8h1a2 2 0 0 0 1.905-1.388l1.372 1.372a2 2 0 0 0 2.74 2.74zM4.293 5L5 5.707V6a1 1 0 0 1-1 1H3V5.5a.5.5 0 0 1 .5-.5zm3.74 3.741L9.26 9.966a1 1 0 0 1-1.225-1.225M3.5 13a.5.5 0 0 1-.5-.5V11h1a1 1 0 0 1 1 1v1zM14 10c-.523 0-.998.2-1.354.528l.708.709A1 1 0 0 1 14 11h1v1.5a.5.5 0 0 1-.093.29l.71.71c.238-.265.383-.616.383-1v-7A1.5 1.5 0 0 0 14.5 4H6.117l1 1H12v1a2 2 0 0 0 2 2h1v2zm.5-5a.5.5 0 0 1 .5.5V7h-1a1 1 0 0 1-1-1V5zm1.826 9.208l.707.708c.6-.629.967-1.48.967-2.416v-5a1.5 1.5 0 0 0-1-1.415V12.5c0 .66-.256 1.261-.674 1.708" />
                    </svg>
                </div>
                <div class="info flex flex-col md:gap-3 lg:items-center lg:flex-row">
                    <h5 class="text-md lg:text-2xl font-medium text-pretty text-white">
                        SPP Terbayar Tahun Ajaran Lainnya
                    </h5>
                    <span class="text-2xl md:text-3xl lg:text-5xl text-white font-bold">
                        {{ count($byr_all) }}/{{ $bulan_all }}
                    </span>
                </div>

                {{-- <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div> --}}
            </a>
        </div>
    </section>

    <section class="mt-10 px-7 md:px-12 py-12 bg-gradient-to-r from-myBlueOcean to-mySkyBlue rounded-t-[3rem]">
        <div class="inline-flex mb-5 items-center w-full justify-between text-white">
            <h2 class="text-2xl md:text-3xl font-bold ">Riwayat Pembayaran Terbaru</h2>

            <a href="{{ route('riwayat-pembayaran') }}"
                class="py-1.5 px-3 text-xs md:text-base inline-flex gap-x-2 bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br rounded-xl font-medium">
                Lihat selengkapnya
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center" viewBox="0 0 32 32">
                    <path fill="currentColor" d="m16 8l-1.43 1.393L20.15 15H8v2h12.15l-5.58 5.573L16 24l8-8z" />
                    <path fill="currentColor"
                        d="M16 30a14 14 0 1 1 14-14a14.016 14.016 0 0 1-14 14m0-26a12 12 0 1 0 12 12A12.014 12.014 0 0 0 16 4" />
                </svg>
            </a>
        </div>

        <div class="tabel-riwayat-pembayaran w-full overflow-x-auto">
            <table class="w-max min-w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
                id="">
                <thead class="text-xs text-white uppercase bg-myNavy">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-ss-xl">
                            Nomor Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Ajaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Bayar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Metode Pembayaran
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-se-xl">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data_pembayaran && count($data_pembayaran) != 0)
                        @foreach ($data_pembayaran as $index => $pembayaran)
                            <tr class="bg-white even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pembayaran->no_pembayaran }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ date_format(date_create($pembayaran->tgl_bayar), 'd M Y') }}

                                </td>

                                {{-- Cari bulan yang sudah terbayar --}}
                                @if ($pembayaran->no_pembayaran != null)
                                    <td class="px-6 py-4">
                                        {{ $pembayaran->thn_ajaran }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp. {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $pembayaran->metodePembayaran->jenis_pembayaran }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($pembayaran->status == 'Success')
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                {{ $pembayaran->status }}
                                            </span>
                                        @elseif ($pembayaran->status == 'Failed')
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                {{ $pembayaran->status }}
                                            </span>
                                        @elseif ($pembayaran->status == 'Pending')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ $pembayaran->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('riwayat-pembayaran.show', $pembayaran->no_pembayaran) }}"
                                            class="text-white  bg-myNavy group font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="fas fa-eye group-hover:text-mySkyBlue"></i>
                                        </a>
                                    </td>
                                @else
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                    <td class="px-6 py-4">
                                        <span>-</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        -
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center bg-blue-100 rounded-b-xl">
                                Tidak Ada Riwayat Pembayaran
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>


    </section>
@endsection
