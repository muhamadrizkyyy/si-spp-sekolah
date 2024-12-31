@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">{{ $pages }}</h1>
            </div>


            <a href="{{ route('siswa.create') }}"
                class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambahkan &nbsp;
            </a>

        </div>
    </div>

    <div class="p-2">
        <div class="relative shadow-md sm:rounded-lg px-3">
            <livewire:admin.siswa.tabel-siswa />
        </div>
    </div>
@endsection
