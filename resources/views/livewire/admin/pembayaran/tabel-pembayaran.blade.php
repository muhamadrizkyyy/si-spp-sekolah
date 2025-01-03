<div>
    <div class="flex mb-3 justify-between">
        <div class="filter-btn-group flex gap-x-3">
            <div class="select_kelas">
                <select id="Kelas" wire:model='selected_kelas' wire:key='select-kelas'
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>.: Pilih Kelas:.</option>
                    @foreach ($data_kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->kode_kelas }}</option>
                    @endforeach
                </select>
            </div>
            @if ($selected_kelas)
                <div class="select_siswa">
                    @if ($data_siswa->isNotEmpty())
                        <select id="select-siswa" wire:model='selected_siswa' wire:key='select-siswa'
                            class="selectpicker bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>.: Pilih Siswa :.</option>
                            @foreach ($data_siswa as $item)
                                <option value="{{ $item->nisn }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    @else
                        <button disabled
                            class="bg-white border border-gray-300 text-gray-900 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">
                            Tidak Ada Data Siswa
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <hr class="my-5 border border-gray-500">


    <form wire:submit.prevent='bayar'>
        @if ($selected_siswa != null)
            <div class="action-btn-group flex justify-between my-5">
                <div class="select_thn_ajaran">
                    <label for="thn_ajaran" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Tahun
                        Ajaran</label>
                    <select id="thn_ajaran" wire:model='selected_thn_ajaran' wire:key='select-thn-ajaran'
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>.: Pilih Tahun Ajaran :.</option>
                        @foreach ($data_thn_ajaran as $item)
                            <option value="{{ $item->thn_ajaran }}">{{ $item->thn_ajaran }}</option>
                        @endforeach
                    </select>
                </div>

                @if (count($pickBulan) > 0)
                    <div class="pembayaran-btn">
                        <button disabled
                            class="bg-white border border-gray-300 text-gray-900 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">

                            Rp. {{ number_format($total_bayar_spp, 0, ',', '.') }}
                        </button>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Bayar
                        </button>
                    </div>
                @endif
            </div>
        @endif



        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="">
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
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data_pembayaran && $selected_thn_ajaran)
                    @foreach ($data_pembayaran as $index => $pembayaran)
                        @php
                            $indexBulan = $pembayaran->bulan;
                        @endphp
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($index > 5)
                                    {{ $this->setBulanTahun($thn_ajaran_akhir, $indexBulan) }}
                                @else
                                    {{ $this->setBulanTahun($thn_ajaran_awal, $indexBulan) }}
                                @endif
                            </th>

                            {{-- Cari bulan yang sudah terbayar --}}
                            @if ($pembayaran->no_pembayaran != null)
                                <td class="px-6 py-4">
                                    {{ $pembayaran->no_pembayaran }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $this->formatDate($pembayaran->tgl_bayar) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pembayaran->metodePembayaran->jenis_pembayaran }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pembayaran->petugas->nama }}
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
                                <td class="px-6 py-4">
                                    <a href="{{ route('pembayaran.cetak', $pembayaran->no_pembayaran) }}"
                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    <span>-</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input id="checkbox-all-search" type="checkbox" value="{{ $indexBulan }}"
                                            wire:model="pickBulan" wire:key="pickBulan-{{ $indexBulan }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center bg-gray-200">
                            @if ($selected_kelas != null)
                                Cari Siswa Berdasarkan Nama
                            @else
                                Cari Siswa Berdasarkan Kelas & Nama
                            @endif
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </form>
</div>
