@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Form {{ isset($id_metode) ? 'Edit' : 'Tambah' }} {{ $pages }}</h1>
            </div>
        </div>
    </div>

    <div class="form-field p-5">
        @if (isset($id_metode))
            <livewire:admin.metode-pembayaran.form-metode-pembayaran :id="$id_metode" />
        @else
            <livewire:admin.metode-pembayaran.form-metode-pembayaran />
        @endif
    </div>
@endsection
