@extends('layouts.mainSiswa')

@section('content')
    <section class="photo-profile flex justify-center">
        <div
            class="card inline-flex w-10/12 lg:w-[35%] py-5 px-4 md:px-8 gap-x-3 md:gap-x-7 bg-gradient-to-r from-myOrange to-myYellowSand rounded-2xl">
            <div class="foto bg-white w-[25%] rounded-lg ">
                <img src="{{ asset('storage/assets/bg/avatar.jpg') }}" alt="foto siswa"
                    class="h-full aspect-[4/5] object-cover rounded-lg">
            </div>
            <div class="profile-singkat text-white">
                <h4 class="font-bold text-md md:text-2xl">{{ $siswaLogin->nama }}</h4>
                <p class="text-xs md:text-lg">{{ $siswaLogin->nisn }}</p>
                <p class="text-xs md:text-lg">{{ $siswaLogin->kelas->kode_kelas }}</p>
                <p class="text-xs md:text-lg">{{ $siswaLogin->jurusan->kode_jurusan }}</p>
            </div>
        </div>
    </section>

    <section class="informasi-siswa bg-gradient-to-r from-myBlueOcean to-mySkyBlue mt-10 rounded-t-[3rem]">
        <div class="title bg-myNavy py-5 px-10 md:px-12 rounded-t-[3rem]">
            <h3 class="text-2xl font-bold text-white inline-flex items-center gap-x-3">
                <i class="fa fa-user-graduate"></i>
                Informasi Siswa
            </h3>
        </div>

        <div class="biodata-siswa mt-10 px-7 md:px-12 pb-7">
            <div class="mb-3">
                <label for="nisn" class="block mb-2 text-sm font-medium text-white">
                    NISN
                </label>
                <input type="text" disabled value="{{ $siswaLogin->nisn }}" id="nisn"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
            <div class="mb-3">
                <label for="nama" class="block mb-2 text-sm font-medium text-white">
                    Nama Lengkap
                </label>
                <input type="text" disabled value="{{ $siswaLogin->nama }}" id="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
            <div class="mb-3">
                <label for="gender" class="block mb-2 text-sm font-medium text-white">
                    Gender
                </label>

                <div class="flex gap-x-3">
                    <div class="flex items-center">
                        <input id="laki" type="radio" value="L" disabled
                            {{ $siswaLogin->gender == 'L' ? 'checked' : '' }}
                            class="w-4 h-4 text-myOrange bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-white">
                            Laki Laki
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input id="perempuan" type="radio" value="P" disabled
                            {{ $siswaLogin->gender == 'P' ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-white">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama" class="block mb-2 text-sm font-medium text-white">
                    Tanggal Lahir
                </label>

                <div class="relative max-w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input type="text" disabled value="{{ date_format(date_create($siswaLogin->tgl_lahir), 'd/m/Y') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="MM/DD/YYYY">
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="block mb-2 text-sm font-medium text-white">
                    Alamat
                </label>
                <textarea id="alamat" rows="4" disabled
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $siswaLogin->alamat }}</textarea>
            </div>
            <div class="mb-3 flex gap-3">
                <div class="kelas w-full">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-white">
                        Kelas
                    </label>
                    <input type="text" disabled value="{{ $siswaLogin->kelas->kode_kelas }}" id="kelas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="jurusan w-full">
                    <label for="jurusan" class="block mb-2 text-sm font-medium text-white">
                        Jurusan
                    </label>
                    <input type="text" disabled value="{{ $siswaLogin->jurusan->kode_jurusan }}" id="jurusan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
            <div class="mb-3 flex gap-3">
                <div class="thn_ajaran w-full">
                    <label for="thn_ajaran" class="block mb-2 text-sm font-medium text-white">
                        Tahun Ajaran
                    </label>
                    <input type="text" disabled value="{{ $siswaLogin->thn_ajaran }}" id="thn_ajaran"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="thn_ajaran_masuk w-full">
                    <label for="thn_ajaran_masuk" class="block mb-2 whitespace-nowrap text-sm font-medium text-white">
                        Tahun Ajaran Awal Masuk
                    </label>
                    <input type="text" disabled value="{{ $siswaLogin->thn_ajaran_masuk }}" id="thn_ajaran_masuk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
            </div>
        </div>
    </section>
@endsection
