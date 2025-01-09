@extends('layouts.mainSiswa')

@section('content')
    <section class="counting-payment px-7 md:px-12">
        <div class="greeting">
            <h1 class="text-2xl md:text-5xl font-bold">Halo, {{ session('nama') }}</h1>
            <p class="text-sm md:text-lg mt-1">Selamat datang kembali, ini rekapitulasi pembayaran spp kamu di
                {{ $identitas_web->nama_institusi }}</p>
        </div>
        <div class="count-payment flex flex-col gap-5 md:flex-row justify-between mt-7">
            <a href="#"
                class="flex items-center bg-gradient-to-r px-5 py-7 gap-x-7 from-myOrange to-myYellowSand hover:bg-gradient-to-br rounded-3xl shadow md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="icon bg-white p-4 rounded-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-myOrange h-14 w-14" viewBox="0 0 2048 2048">
                        <path fill="currentColor"
                            d="M2048 384v1280H128v-256H0V256h1792v128zm-512 0q0 27 10 50t27 40t41 28t50 10V384zM128 512q27 0 50-10t40-27t28-41t10-50H128zm0 512q53 0 99 20t82 55t55 81t20 100h1024q0-53 20-99t55-82t81-55t100-20V640q-53 0-99-20t-82-55t-55-81t-20-100H384q0 53-20 99t-55 82t-81 55t-100 20zm1536 128q-27 0-50 10t-40 27t-28 41t-10 50h128zM128 1280h128q0-27-10-50t-27-40t-41-28t-50-10zm1792-768h-128v896H256v128h1664zM448 896q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m896 0q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m-448 256q-53 0-99-20t-82-55t-55-81t-20-100V768q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100v128q0 53-20 99t-55 82t-81 55t-100 20M768 896q0 27 10 50t27 40t41 28t50 10q27 0 50-10t40-27t28-41t10-50V768q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50z" />
                    </svg>
                </div>
                <div class="info flex flex-col md:gap-3 md:items-center md:flex-row">
                    <h5 class="text-lg  md:text-2xl font-medium text-white">
                        SPP Terbayar Tahun {{ $siswaLogin->thn_ajaran }}
                    </h5>
                    <span class="text-4xl md:text-5xl text-white font-bold">
                        {{ count($byr_thn_ajaran) }}/12
                    </span>
                </div>

                {{-- <div class="flex flex-col justify-between p-4 leading-normal">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                </div> --}}
            </a>
            <a href="#"
                class="flex items-center bg-gradient-to-r px-5 py-7 gap-x-7 from-myOrange to-myYellowSand hover:bg-gradient-to-br rounded-3xl shadow md:max-w-xl dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="icon bg-white p-4 rounded-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-myOrange h-14 w-14" viewBox="0 0 2048 2048">
                        <path fill="currentColor"
                            d="M2048 384v1280H128v-256H0V256h1792v128zm-512 0q0 27 10 50t27 40t41 28t50 10V384zM128 512q27 0 50-10t40-27t28-41t10-50H128zm0 512q53 0 99 20t82 55t55 81t20 100h1024q0-53 20-99t55-82t81-55t100-20V640q-53 0-99-20t-82-55t-55-81t-20-100H384q0 53-20 99t-55 82t-81 55t-100 20zm1536 128q-27 0-50 10t-40 27t-28 41t-10 50h128zM128 1280h128q0-27-10-50t-27-40t-41-28t-50-10zm1792-768h-128v896H256v128h1664zM448 896q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m896 0q-26 0-45-19t-19-45t19-45t45-19t45 19t19 45t-19 45t-45 19m-448 256q-53 0-99-20t-82-55t-55-81t-20-100V768q0-53 20-99t55-82t81-55t100-20q53 0 99 20t82 55t55 81t20 100v128q0 53-20 99t-55 82t-81 55t-100 20M768 896q0 27 10 50t27 40t41 28t50 10q27 0 50-10t40-27t28-41t10-50V768q0-27-10-50t-27-40t-41-28t-50-10q-27 0-50 10t-40 27t-28 41t-10 50z" />
                    </svg>
                </div>
                <div class="info flex flex-col md:gap-3 md:items-center md:flex-row">
                    <h5 class="text-lg md:text-2xl font-medium text-pretty text-white">
                        SPP Terbayar Tahun Ajaran Lainnya
                    </h5>
                    <span class="text-4xl md:text-5xl text-white font-bold">
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
@endsection
