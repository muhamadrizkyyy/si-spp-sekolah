@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">{{ $pages }}</h1>
            </div>
        </div>
    </div>

    <div class="pt-4">
        <div class="shadow-md sm:rounded-lg px-3 pb-5">
            <livewire:admin.laporan.tabel-laporan />
        </div>
    </div>
@endsection

@section('script')
    {{-- CDN SELECT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            select2();

            function select2() {
                //inisialisasi lib select2
                $('.selectpicker').select2();

                //simpan id siswa yang dipilih
                $('.selectpicker').on('change', function(e) {
                    var data = $(this).val();
                    console.log(data);
                    livewire.emit('changeSelectedSiswa', data)
                })
            }

            // inisialisasi ulang library js setelah component livewire di update
            document.addEventListener('livewire:update', function() {
                console.log('Livewire component updated');
                // initializeYourLibrary(); // Panggil fungsi untuk inisialisasi ulang library
                select2();
            });
        });
    </script>
@endsection
