<div>
    <div class="flex mb-3 gap-x-3">
        <div class="filter-btn-group flex gap-x-3">
            <div class="select_thn_ajaran">
                <select id="thn_ajaran" wire:model='selected_thn_ajaran' wire:key='select-thn-ajaran'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>.: Pilih Tahun Ajaran :.</option>
                    @foreach ($data_thn_ajaran as $item)
                        <option value="{{ $item->thn_ajaran }}">{{ $item->thn_ajaran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="select_kelas">
                <select id="Kelas" wire:model='selected_kelas' wire:key='select-kelas'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>.: Pilih Kelas:.</option>
                    @foreach ($data_kelas as $item)
                        <option value="{{ $item->id }}">{{ $item->kode_kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @if (count($data_siswa) > 0)
            <div class="export-btn-group">
                <button
                    class="btn text-green-700 hover:text-white border border-green-700 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-all duration-100 ease-in-out"
                    type="button" wire:click="downloadPDF">
                    <span wire:loading.remove>Export PDF</span>
                    <div class="" wire:loading>
                        Downloading Report...
                    </div>
                </button>
            </div>
        @endif
    </div>

    <div class="overflow-x-auto">
        <table class="w-max min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            id="">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Juli
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Agustus
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        September
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Oktober
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        November
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Desember
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Januari
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Februari
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Maret
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        April
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mei
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Juni
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data_siswa != [])
                    @if ($data_siswa->count() > 0)
                        @foreach ($data_siswa as $siswa)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $siswa->nama }}
                                </th>

                                {{-- Cari bulan yang sudah terbayar --}}
                                @foreach ($this->getDataPembayaran($siswa->nisn) as $index => $pembayaran)
                                    @if ($pembayaran->no_pembayaran != null)
                                        <td class="px-6 py-4">
                                            {{ $this->formatDate($pembayaran->tgl_bayar) }}
                                        </td>
                                    @else
                                        <td class="px-6 py-4 text-center">
                                            X
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="13" class="px-6 py-4 text-center bg-gray-200">
                                Tidak ada data
                            </td>
                        </tr>
                    @endif
                @else
                    <tr>
                        <td colspan="13" class="px-6 py-4 text-center bg-gray-200">
                            Cari Siswa Berdasarkan Kelas
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>
