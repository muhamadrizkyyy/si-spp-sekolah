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

<body>
    {{-- Loader --}}
    <div class="absolute z-[100]">
        <div id="loader"
            class="fixed inset-0 bg-gradient-to-r bg-myNavy flex justify-center items-center z-50 hidden">
            {{-- /* From Uiverse.io by Javierrocadev */ --}}
            <div class="flex flex-row gap-2">
                <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.3s]"></div>
                <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.1s]"></div>
                <div class="w-4 h-4 rounded-full bg-white animate-bounce [animation-delay:.3s]"></div>
            </div>
        </div>
    </div>

    <main>
        @include('partials.siswa.navbar')
        @yield('content')
    </main>
    @include('partials.siswa.footer')


    <script src="{{ asset('js/flowbite.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- DataTable --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        function customNav(height) {
            if (height > 20) {
                $("#navbar").removeClass("w-[95%] rounded-3xl");
                $("#navbar").addClass("w-full");
            } else {
                $("#navbar").removeClass("w-full");
                $("#navbar").addClass("w-[95%] rounded-3xl");
            }
        }

        $(document).ready(function() {
            var height = $(document).scrollTop();
            customNav(height);

            $(document).scroll(function() {
                height = $(document).scrollTop();
                customNav(height);
            })

        });
    </script>

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
    </script>

    @yield('script')

    @livewireScripts
</body>

</html>
