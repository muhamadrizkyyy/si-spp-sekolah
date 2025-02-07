<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembayaran SPP | SI SPP SEKOLAH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .alamat {
            border-bottom: 1px solid #000;
            margin-bottom: 1.2rem;
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

        tfoot td {
            background: #e0e0e0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="alamat text-center">
        <h1 class="text-4xl font-bold">LAPORAN KEUANGAN SPP</h1>
        <h1 class="text-4xl font-bold my-2">{{ $identitas_web->nama_institusi }}</h1>
        <p class="text-sm"> {{ $identitas_web->alamat }} </p>
        <p class="text-xs"> {{ $identitas_web->no_telp }} | {{ $identitas_web->email }}</p>
    </div>

    <table class="info-table" style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
        <tr>
            @if (session('filter'))
                <th class="py-2" style="background: #e0e0e0; padding-left: 10px;">
                    @if (session('filter')[0] === 'D-day')
                        Tanggal
                    @elseif (session('filter')[0] === 'week')
                        Tanggal
                    @elseif (session('filter')[0] === 'month')
                        Bulan
                    @elseif (session('filter')[0] === 'year')
                        Tahun
                    @elseif (session('filter')[0] === 'rangeDate')
                        Tanggal
                    @endif
                </th>
                <th style="padding-left: 10px; width: 50%; background: #f0f0f0">
                    @if (session('filter')[0] === 'D-day')
                        {{ date('d/m/Y', strtotime(session('filter')[1])) }}
                    @elseif (session('filter')[0] === 'week')
                        {{ date('d/m/Y', strtotime(session('filter')[1])) }} -
                        {{ date('d/m/Y', strtotime(session('filter')[2])) }}
                    @elseif (session('filter')[0] === 'month')
                        {{ session('filter')[1] }}
                    @elseif (session('filter')[0] === 'year')
                        {{ date('Y', strtotime(session('filter')[1])) }}
                    @elseif (session('filter')[0] === 'rangeDate')
                        {{ date('d/m/Y', strtotime(session('filter')[1])) }} -
                        {{ date('d/m/Y', strtotime(session('filter')[2])) }}
                    @endif
                </th>
            @endif
        </tr>
    </table>

    <table class="data-table">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    No Pembayaran
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nama Siswa
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Tanggal Bayar
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Bulan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Tahun Ajaran
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pembayaran as $key => $item)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $key + 1 }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['no_pembayaran'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['nama_siswa'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['tgl_bayar'] }}
                    </td>
                    <td class="px-6 py-4" style="text-align: left; vertical-align: middle;">
                        <ol>
                            @foreach ($item['bulan'] as $b)
                                <li>{{ $b }}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td class="px-6 py-4">
                        {{ $item['thn_ajaran'] }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        {{ number_format($item['total'], 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="text-center font-bold bg-gray-50">
            <tr>
                <td colspan="6" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Total</td>
                <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">
                    {{ number_format($grand_total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
