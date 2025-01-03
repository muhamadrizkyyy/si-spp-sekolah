<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pages }} | SI SPP SEKOLAH</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        * {
            font-size: 6px;
        }
    </style>
</head>

<body>
    <div class="alamat text-center mt-10">
        <h1 class="text-4xl font-bold"> BUKTI PEMBAYARAN SPP</h1>
        <h1 class="text-4xl font-bold my-2">{{ $identitas_web->nama_institusi }}</h1>
        <p class="text-sm"> {{ $identitas_web->alamat }} </p>
        <p class="text-xs"> {{ $identitas_web->no_telp }} | {{ $identitas_web->email }}</p>
    </div>


    <hr class="h-px my-8 bg-gray-300 border-0">


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    No Pembayaran
                </th>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    :
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{ $data_pembayaran->no_pembayaran }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    NISN
                </th>
                <td class="px-6 py-4">
                    :
                </td>
                <td class="px-6 py-4">
                    {{ $data_pembayaran->nisn }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Nama
                </th>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    :
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{ $data_pembayaran->siswaBayar->nama }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <td class="px-6 py-4">
                    :
                </td>
                <td class="px-6 py-4">
                    {{ $data_pembayaran->siswaBayar->kelas->kode_kelas }}
                </td>
            </tr>
        </thead>
    </table>

    <p class="text-sm my-4">Dengan ini melakukan pembayaran spp untuk
        <span class="font-semibold">
            {{ count($bulan_bayar) }} Bulan
        </span>
        yaitu :
    </p>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="datatable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Bulan
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bulan_bayar as $item)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $tgl_bayar }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        Rp. {{ $nominal_spp }}
                    </td>
                </tr>
            @endforeach
            <tr
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" colspan="2"
                    class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total
                </th>
                <td class="px-6 py-4 font-bold text-right">
                    Rp. {{ number_format($data_pembayaran->total_bayar, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-end mt-5">
        <table class="text-left border-b border-gray-500">
            <tr>
                <td class="font-semibold">Mojokerto, {{ $tgl_now }}</td>
            </tr>
            <tr>
                <th>{{ $data_pembayaran->petugas->nama }}</th>
            </tr>
            <tr>
                <td class="py-12"></td>
            </tr>
        </table>
    </div>

    <script src="{{ asset('js/flowbite.js') }}"></script>
    {{-- Jquery --}}
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
</body>

</html>

<script>
    window.print();
</script>
