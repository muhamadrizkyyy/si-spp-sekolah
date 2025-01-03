@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Halaman {{ $pages }}</h1>
        </div>
    </div>

    <div class="flex justify-center">
        <div
            class="w-3/4 md:w-1/2 bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 hover:bg-gradient-to-br px-5 py-2.5 mt-6 text-center shadow-md rounded-full">
            <h2 class="text-xl font-bold text-white">Selamat Datang {{ Auth::user()->nama }}</h2>
        </div>
    </div>

    <livewire:admin.dashboard.statistic />
@endsection

@section('script')
    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
@endsection
