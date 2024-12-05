@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Form {{ isset($kelas) ? 'Edit' : 'Tambah' }} Data Kelas</h1>
            </div>
        </div>
    </div>

    <div class="form-field p-5">
        @if (isset($kelas))
            <livewire:admin.kelas.form-kelas :kelas="$kelas"></livewire:admin.kelas.form-kelas>
        @else
            <livewire:admin.kelas.form-kelas :kelas="null"></livewire:admin.kelas.form-kelas>
        @endif
    </div>
@endsection
