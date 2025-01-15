<div>
    <div class="w-fit sm:w-full">
        <div class="filter-btn-group mb-3 mt-5">
            <h6 class="text-lg font-bold inline-flex items-center gap-x-1 text-myNavy mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M14 12v7.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0l-2.01-2.01a.99.99 0 0 1-.29-.83V12h-.03L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L14.03 12z" />
                </svg>
                Filter
            </h6>
            <div class="flex gap-x-1">
                <div class="filter w-fit">
                    <select id="filter" wire:model='selected_filter' wire:key='selected_filter'
                        {{ $start_date || $end_date ? 'disabled' : '' }}
                        class="border-2 border-myNavy disabled:bg-gray-200 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>.: Pilih Filter :.</option>
                        <option value="D-day">Hari Ini</option>
                        <option value="month">Bulan Ini</option>
                        <option value="year">Tahun Ini</option>
                    </select>
                </div>
                <div class="filter-by-range">
                    <div id="date-range-picker" class="flex items-center">
                        <div class="relative">
                            <input name="start" type="date" wire:model='start_date'
                                {{ $selected_filter ? 'disabled' : '' }}
                                class="border-2 border-myNavy disabled:bg-gray-200 text-gray-500 text-sm rounded-lg py-2.5"
                                placeholder="Select date start">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <input name="end" type="date" wire:model='end_date'
                                {{ $selected_filter ? 'disabled' : '' }}
                                class="border-2 border-myNavy disabled:bg-gray-200 text-gray-500 text-sm rounded-lg py-2.5"
                                placeholder="Select date end">
                        </div>
                    </div>
                </div>
                @if ($selected_filter != null || ($start_date && $end_date))
                    <button class="btn text-gray-600 font-bold py-2 ms-2 rounded" type="button"
                        wire:click="rmSelected">
                        <i class="fas fa-times"></i>
                    </button>
                @endif
            </div>
        </div>
        <table class="w-max min-w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
            wire:key='tabel-riwayat' id="">
            <thead class="text-xs text-white uppercase bg-myNavy">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-ss-xl">
                        Nomor Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tahun Ajaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Bayar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Metode Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-se-xl">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($this->collectDataPembayaran($start_date ? 'rangeDate' : $selected_filter)) != 0)
                    @foreach ($this->collectDataPembayaran($start_date ? 'rangeDate' : $selected_filter) as $index => $pembayaran)
                        <tr class="odd:bg-blue-100 even:bg-blue-50 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pembayaran->no_pembayaran }}
                            </th>
                            <td class="px-6 py-4">
                                {{ date_format(date_create($pembayaran->tgl_bayar), 'd M Y') }}

                            </td>

                            {{-- Cari bulan yang sudah terbayar --}}
                            @if ($pembayaran->no_pembayaran != null)
                                <td class="px-6 py-4">
                                    {{ $pembayaran->thn_ajaran }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp. {{ number_format($pembayaran->total_bayar, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pembayaran->metodePembayaran->jenis_pembayaran }}
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
                                        class="text-white  bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br group font-medium rounded-lg text-sm w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                            Tidak Ada Riwayat Pembayaran
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($this->collectDataPembayaran($selected_filter ? "$selected_filter" : 'rangeDate')) > 0)
            <div class="mt-4 ">
                {{ $this->collectDataPembayaran()->links() }} <!-- Link pagination -->
            </div>
        @endif

    </div>
</div>
