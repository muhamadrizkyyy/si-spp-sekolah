@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Halaman {{ $pages }}</h1>
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
