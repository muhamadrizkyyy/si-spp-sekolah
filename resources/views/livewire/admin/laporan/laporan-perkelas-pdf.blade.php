<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi | SI SPP SEKOLAH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @php
        use Carbon\Carbon;

        //method untuk ubah format tanggal
        function formatDate($date)
        {
            return Carbon::parse($date)->format('d/m/y');
        }
    @endphp
</head>

<body>
    <div class="alamat text-center" style="border-bottom: 1px solid #000; margin-bottom: 1.2rem;">
        <h1 class="text-4xl font-bold"> LAPORAN PEMBAYARAN SPP </h1>
        <h1 class="text-4xl font-bold my-2">{{ $identitas_web->nama_institusi }}</h1>
        <p class="text-sm"> {{ $identitas_web->alamat }} </p>
        <p class="text-xs"> {{ $identitas_web->no_telp }} | {{ $identitas_web->email }}</p>
    </div>


    <table class="info-table" style="width: 100%; border-collapse: collapse; margin-bottom: 10px;">
        <tr>
            <th class="py-2" style="background: #e0e0e0; padding-left: 10px;">Kelas</th>
            <th style="padding-left: 10px; width: 50%; background: #f0f0f0">
                {{ $kelas }}
            </th>
        </tr>
        <tr>
            <th class="py-2" style="background: #e0e0e0; padding-left: 10px;">Tahun Ajaran</th>
            <th style="padding-left: 10px; width: 50%; background: #f0f0f0">
                {{ $thn_ajaran }}
            </th>
        </tr>
    </table>

    <table class="table data-table" style="width: 100%; border-collapse: collapse;">
        <thead style="background: #e0e0e0;">
            <tr>
                <th scope="col" class="text-center" style="padding: 5px;">No.</th>
                <th scope="col" style="padding: 5px; text-align: left; width: 20%;">Nama Siswa</th>
                <th scope="col" class="text-center" style="padding: 5px;">Juli</th>
                <th scope="col" class="text-center" style="padding: 5px;">Agustus</th>
                <th scope="col" class="text-center" style="padding: 5px;">September</th>
                <th scope="col" class="text-center" style="padding: 5px;">Oktober</th>
                <th scope="col" class="text-center" style="padding: 5px;">November</th>
                <th scope="col" class="text-center" style="padding: 5px;">Desember</th>
                <th scope="col" class="text-center" style="padding: 5px;">Januari</th>
                <th scope="col" class="text-center" style="padding: 5px;">Februari</th>
                <th scope="col" class="text-center" style="padding: 5px;">Maret</th>
                <th scope="col" class="text-center" style="padding: 5px;">April</th>
                <th scope="col" class="text-center" style="padding: 5px;">Mei</th>
                <th scope="col" class="text-center" style="padding: 5px;">Juni</th>
                <th scope="col" class="text-center" style="padding: 5px; width: 20%;">Rekap</th>
            </tr>
        </thead>
        <tbody>
            @foreach (json_decode($data, true) as $key => $value)
                <tr style="background-color: {{ $key % 2 == 0 ? '#f0f0f0' : '#ffffff' }};">
                    <th style="padding: 10px; text-align: center;">
                        {{ $key + 1 }}
                    </th>
                    <th scope="row" style="padding: 10px; text-align: left; word-wrap: break-word;">
                        {{ $value['siswa'] }}
                    </th>

                    {{-- Cari bulan yang sudah terbayar --}}
                    @foreach ($value['pembayaran'] as $index => $pembayaran)
                        <td class="text-center" style="padding: 10px;">
                            @if ($pembayaran['no_pembayaran'] != null && $pembayaran['status'] == 'Success')
                                {{ $value['nominal_spp'] }}
                            @else
                                X
                            @endif
                        </td>
                        @if ($index == 11)
                            <td class="text-left" style="display: flex; flex-direction: column; padding: 10px;">
                                <span>
                                    Total Tagihan :
                                    {{ number_format($value['rekap_bayar']['total_terbayar'] + $value['rekap_bayar']['total_belum_terbayar'], 0, ',', '.') }}
                                </span>
                                <br>
                                <span>
                                    Total Terbayar :
                                    {{ number_format($value['rekap_bayar']['total_terbayar'], 0, ',', '.') }}
                                </span>
                                <br>
                                <span>
                                    Total Belum Terbayar :
                                    {{ number_format($value['rekap_bayar']['total_belum_terbayar'], 0, ',', '.') }}
                                </span>
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
