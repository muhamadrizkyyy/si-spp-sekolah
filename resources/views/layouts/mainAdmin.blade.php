<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pages }} | SI SPP SEKOLAH</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    @isset($logo)
        <link rel="shortcut icon" href="{{ asset('storage/assets/logo/' . $logo) }}" type="image/png">
    @endisset
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    @yield('style')

    <style>
        /* Custom Scrollbar Styles */
        ::-webkit-scrollbar {
            width: 12px;
            /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Background of the scrollbar track */
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Rounded corners for the thumb */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Color of the scrollbar thumb on hover */
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
    <header>
        @include('partials.admin.navbar')
    </header>

    <main>
        <div class="flex flex-col md:flex-row">
            {{-- Sidebar --}}
            @include('partials.admin.sidebar')
            {{-- Sidebar END --}}
            {{-- Loader --}}
            <div id="loader"
                class="fixed inset-0 bg-gradient-to-r bg-myNavy flex justify-center items-center z-50 hidden">
                {{-- /* From Uiverse.io by Javierrocadev */ --}}
                <div class="flex flex-row gap-2">
                    <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.3s]"></div>
                    <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.1s]"></div>
                    <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.3s]"></div>
                </div>
            </div>


            <div id="main"
                class="main-content overflow-hidden w-full bg-gray-100 mt-12 md:mt-4 pb-24 md:pb-1 min-h-screen">
                @yield('content')
            </div>
        </div>
    </main>




    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }

        // Loader
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById('loader');

            // Tampilkan loader saat memuat halaman
            loader.classList.remove('hidden');

            // Sembunyikan loader setelah halaman sepenuhnya dimuat
            window.addEventListener('load', function() {
                setTimeout(() => {
                    loader.classList.add('hidden');
                }, 1000); // Delay 500ms sebelum menyembunyikan loader
            });
        });
    </script>

    <script src="{{ asset('js/flowbite.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- DataTable --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    {{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script> --}}

    @if (session('status'))
        <script>
            Swal.fire({
                icon: "{{ session('status') }}",
                text: "{{ session('msg') }}",
            });
        </script>
    @endif

    <script>
        $('#datatable').DataTable();

        // Delete btn onclick
        function deleteBtnAct(itemId) {
            Swal.fire({
                title: "Apakah kamu yakin ingin menghapus data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, dihapus",
                cancelButtonText: "Batal",
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Livewire.emit('deleteAct', itemId); // Panggil event Livewire
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Data berhasil dihapus!",
                        icon: "success"
                    });
                }
            });
        }
    </script>

    @yield('script')

    @livewireScripts
</body>

</html>
