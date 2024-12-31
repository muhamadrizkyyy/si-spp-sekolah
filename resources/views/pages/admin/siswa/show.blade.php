@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Detail {{ $pages }}</h1>
            </div>
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-5">
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Nama
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->nama }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    NISN
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->nisn }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Gender
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->gender }}
                </td>
            </tr>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Tanggal Lahir
                </th>
                <td class="px-6 py-4">
                    {{ $tanggal_lahir }}
                </td>
            </tr>
            <tr>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Alamat
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->alamat }}
                </td>
            </tr>
            <tr>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Kelas
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->kelas->kode_kelas }}
                </td>
            </tr>
            <tr>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Jurusan
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->jurusan->kode_jurusan }}
                </td>
            </tr>
            <tr>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Tahun Ajaran
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->thn_ajaran }}
                </td>
            </tr>
            <tr>
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    Tahun Ajaran Awal Masuk
                </th>
                <td class="px-6 py-4">
                    {{ $siswa->thn_ajaran_masuk }}
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('siswa.index') }}"
        class="mx-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Kembali</a>
@endsection
