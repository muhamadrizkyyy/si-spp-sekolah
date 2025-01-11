<div>
    <div class="w-fit sm:w-full">
        <div class="action-btn-group flex gap-x-3 my-5">
            <div class="select_thn_ajaran md:w-2/12">
                {{-- <label for="thn_ajaran" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Tahun
                    Ajaran</label> --}}
                <select id="thn_ajaran" wire:model='selected_thn_ajaran' wire:key='select-thn-ajaran'
                    class="border-2 border-myNavy text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>.: Pilih Tahun Ajaran :.</option>
                    @foreach ($data_thn_ajaran as $item)
                        <option value="{{ $item->thn_ajaran }}">{{ $item->thn_ajaran }}</option>
                    @endforeach
                </select>
            </div>

            @if ($selected_thn_ajaran)
                <button type="submit" wire:click="downloadPDF"
                    class="text-white bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="fas fa-print"></i>
                    Cetak Laporan
                </button>

                <div wire:loading wire:target="downloadPdf" class="self-center">
                    Downloading Laporan...
                </div>
            @endif
        </div>

        <table class="w-max min-w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
            id="">
            <thead class="text-xs text-white uppercase bg-myNavy">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-ss-xl">
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
                    <th scope="col" class="px-6 py-3 rounded-se-xl">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data_pembayaran)
                    @foreach ($data_pembayaran as $index => $pembayaran)
                        @php
                            $indexBulan = $pembayaran->bulan;
                        @endphp
                        <tr class="odd:bg-blue-100 even:bg-blue-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($index > 5)
                                    {{ $this->setBulanTahun($thn_ajaran_akhir, $indexBulan) }}
                                @else
                                    {{ $this->setBulanTahun($thn_ajaran_awal, $indexBulan) }}
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pembayaran->no_pembayaran }}
                            </td>

                            {{-- Cari bulan yang sudah terbayar --}}
                            @if ($pembayaran->no_pembayaran != null)
                                <td class="px-6 py-4">
                                    {{ $this->formatDate($pembayaran->tgl_bayar) }}
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
                                <td class="px-6 py-4">
                                    <a href="{{ route('riwayat-pembayaran.show', $pembayaran->no_pembayaran) }}"
                                        class="text-white bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <i class="fas fa-eye"></i>
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
                                    <span>-</span>
                                </td>
                                <td class="px-6 py-4">
                                    -
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center bg-blue-100 rounded-b-xl">
                            Pilih Tahun Ajaran
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
