@extends('layouts.mainSiswa')

@section('content')
    <h1 class="text-5xl">{{ $pages }}</h1>
    <livewire:siswa.menu-pembayaran.tabel-menu-pembayaran :id_siswa="1" />
@endsection
