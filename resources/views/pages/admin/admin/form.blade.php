@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Form {{ isset($admin) ? 'Edit' : 'Tambah' }} {{ $pages }}</h1>
            </div>
        </div>
    </div>

    <div class="form-field p-5">
        @if (isset($admin))
            <livewire:admin.admin.form-admin :admin="$admin"></livewire:admin.admin.form-admin>
        @else
            <livewire:admin.admin.form-admin></livewire:admin.admin.form-admin>
        @endif
    </div>
@endsection
