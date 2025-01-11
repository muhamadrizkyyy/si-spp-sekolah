@extends('layouts.mainAdmin')

@section('content')
    <div class="bg-gray-800">
        <div class="p-4 bg-gradient-to-r from-blue-900 to-gray-800 flex justify-between items-center rounded-ss-2xl">
            <div class="rounded-tl-3xl shadow text-2xl text-white">
                <h1 class="font-bold pl-2">{{ $pages }}</h1>
            </div>


            <a href="{{ route('metodePembayaran.create') }}"
                class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambahkan &nbsp;
            </a>

        </div>
    </div>

    <div class="p-2">
        <div class="relative shadow-md sm:rounded-lg px-3">
            <livewire:admin.metode-pembayaran.tabel-metode-pembayaran />
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('livewire:load', () => {
            let datatable;

            function initializeDataTable() {
                if (document.querySelector('#datatable')) {
                    if ($.fn.DataTable.isDataTable('#datatable')) {
                        $('#datatable').DataTable().destroy();
                    }
                    $('#datatable').DataTable({
                        responsive: true,
                        autoWidth: false,
                    });
                }
            }


            initializeDataTable();

            Livewire.hook('message.processed', (message, component) => {
                initializeDataTable(); // Re-initialize DataTable setelah Livewire diupdate
            });
        });
    </script>
@endsection
