<div>
    <div class="flex mb-3 justify-between">
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
            @if ($this->selected_kelas != null)
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
                <button class="btn text-gray-600 font-bold py-2 rounded" type="button" wire:click="rmSelected">
                    <i class="fas fa-times"></i>
                </button>
            @endif
        </div>

        @if ($data_pembayaran)
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

        {{-- <div class="search">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-user pr-0 md:pr-3"></i>
                </div>
                <input type="text" id="simple-search" wire:model='search' wire:key='search'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by name / nisn..." />
            </div>
        </div> --}}
    </div>

    <div class="overflow-x-auto">
        {{-- persiswa --}}
        <table class="w-max min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
            id="">
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
    </div>

    {{-- @if ($data_siswa)
        <table>
            @foreach ($data_siswa as $item)
                @foreach ($this->getDataPembayaran($item->nisn) as $index => $pembayaran)
                    <tr>
                        <td>
                            {{ $item->nama }}
                            @if ($pembayaran->no_pembayaran != null)
                                {{ $pembayaran->bln_bayar }}
                            @else
                                null
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    @endif --}}
</div>
