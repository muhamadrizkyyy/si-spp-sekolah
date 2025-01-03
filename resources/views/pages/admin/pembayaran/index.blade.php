@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">{{ $pages }}</h1>
            </div>


            {{-- <a href="{{ route('jurusan.create') }}"
                class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambahkan &nbsp;
            </a> --}}

        </div>
    </div>

    <div class="pt-4">
        <div class="shadow-md sm:rounded-lg px-3 pb-5">
            <livewire:admin.pembayaran.tabel-pembayaran />
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

            //handling message
            // Livewire.on('showAlert', (status, message) => {
            //     Swal.fire({
            //         icon: status, // 'success' atau 'error'
            //         title: status === 'success' ? 'Berhasil' : 'Gagal',
            //         text: message
            //     });
            // });

            document.addEventListener('livewire:update', function() {
                console.log('Livewire component updated');
                // initializeYourLibrary(); // Panggil fungsi untuk inisialisasi ulang library
                select2();
            });

            function initializeYourLibrary() {
                // $('.selectpicker').select2();
            }
        });
    </script>
@endsection
