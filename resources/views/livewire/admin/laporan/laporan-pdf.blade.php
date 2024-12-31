<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembayaran SPP | SI SPP SEKOLAH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @php
        use Carbon\Carbon;

        function setBulanTahun($y, $m)
        {
            $bulanTahun = Carbon::create($y, $m)->format('F Y');
            return $bulanTahun;
        }

        //method untuk ubah format tanggal
        function formatDate($date)
        {
            return Carbon::parse($date)->format('d F Y');
        }
    @endphp

    <style>
        .alamat {
            border-bottom: 1px solid #000;
            margin-bottom: 1.2rem;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .info-table tr th {
            background: #e0e0e0;
            padding-left: .7rem;
        }

        .info-table td {
            width: 50%;
            padding-left: .7rem;
            background: #f0f0f0;
        }


        .data-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .data-table th {
            word-wrap: break-word;
            background: #e0e0e0;
            text-align: center;
        }

        .data-table td {
            text-align: center;
        }

        .data-table tbody tr th,
        .data-table tbody tr td {
            font-size: .9rem;
            word-wrap: break-word;
        }

        .data-table tr:nth-child(odd) {
            background: #f0f0f0;
        }
    </style>
</head>

<body>
    <div class="alamat text-center">
        <h1 class="text-4xl font-bold"> LAPORAN PEMBAYARAN SPP</h1>
        <h1 class="text-3xl font-bold my-2"> SMKN 2 MOJOKERTO</h1>
        <p class="text-sm"> Jalan Pulorejo, Kelurahan Pulorejo ,Kecamatan Prajuritkulon Kota Mojokerto </p>
        <p class="text-xs"> 0881-960-2056 </p>
    </div>

    <table class="info-table">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3">
                    NISN
                </th>
                <td class="">
                    {{ $data_siswa->nisn }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Nama
                </th>
                <td class=" bg-gray-50 dark:bg-gray-800">
                    {{ $data_siswa->nama }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <td class="">
                    {{ $data_siswa->kelas->kode_kelas }}
                </td>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tahun Ajaran
                </th>
                <td class="">
                    {{ $thn_ajaran }}
                </td>
            </tr>
        </thead>
    </table>

    <table class="data-table">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Bulan
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Metode Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($data_pembayaran)
                @foreach ($data_pembayaran as $index => $pembayaran)
                    @php
                        $indexBulan = $pembayaran->bulan;
                    @endphp
                    <tr>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($index > 5)
                                {{ setBulanTahun($thn_ajaran_akhir, $indexBulan) }}
                            @else
                                {{ setBulanTahun($thn_ajaran_awal, $indexBulan) }}
                            @endif
                        </th>

                        {{-- Cari bulan yang sudah terbayar --}}
                        @if ($pembayaran->no_pembayaran != null)
                            <td class="px-6 py-4">
                                {{ $pembayaran->no_pembayaran }}
                            </td>
                            <td class="px-6 py-4">
                                {{ formatDate($pembayaran->tgl_bayar) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pembayaran->metodePembayaran->jenis_pembayaran }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($pembayaran->user_id != null)
                                    {{ $pembayaran->petugas->nama }}
                                @else
                                    By Sistem
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($pembayaran->status == 'Success')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        {{ $pembayaran->status }}
                                    </span>
                                @elseif ($pembayaran->status == 'Failed')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        {{ $pembayaran->status }}
                                    </span>
                                @elseif ($pembayaran->status == 'Pending')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        {{ $pembayaran->status }}
                                    </span>
                                @endif
                            </td>
                        @else
                            <td class="px-6 py-4">
                                X
                            </td>
                            <td class="px-6 py-4">
                                X
                            </td>
                            <td class="px-6 py-4">
                                X
                            </td>
                            <td class="px-6 py-4">
                                X
                            </td>
                            <td class="px-6 py-4">
                                <span>X</span>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
