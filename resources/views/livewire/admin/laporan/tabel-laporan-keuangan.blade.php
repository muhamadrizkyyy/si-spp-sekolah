<div>
    <div class="flex mb-3 justify-between">
        <div class="filter-btn-group flex gap-x-3">
            <div class="filter w-fit">
                <select id="filter" wire:model='selected_filter' wire:key='selected_filter'
                    {{ $start_date || $end_date ? 'disabled' : '' }}
                    class="disabled:bg-gray-200 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option selected>.: Pilih Filter :.</option>
                    <option value="D-day">Hari Ini</option>
                    <option value="week">Minggu Ini</option>
                    <option value="month">Bulan Ini</option>
                    <option value="year">Tahun Ini</option>
                </select>
            </div>
            <div class="filter-by-range">
                <div id="date-range-picker" class="flex items-center">
                    <div class="relative">
                        <input name="start" type="date" wire:model='start_date'
                            {{ $selected_filter ? 'disabled' : '' }}
                            class="disabled:bg-gray-200 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <input name="end" type="date" wire:model='end_date'
                            {{ $selected_filter ? 'disabled' : '' }}
                            class="disabled:bg-gray-200 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Select date end">
                    </div>
                </div>
            </div>
            @if ($selected_filter != null || ($start_date && $end_date))
                <button class="btn text-gray-600 font-bold py-2 ms-2 rounded" type="button" wire:click="rmSelected">
                    <i class="fas fa-times"></i>
                </button>
            @endif
        </div>

        @if (count($data_pembayaran) > 0)
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
        <table class="w-max min-w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400"
            id="">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        No Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Siswa
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tanggal Pembayaran
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
                @if (count($data_pembayaran) > 0)
                    @foreach ($data_pembayaran as $key => $item)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item['no_pembayaran'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['nama_siswa'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['tgl_bayar'] }}
                            </td>
                            <td class="px-6 py-4 flex flex-col text-left">
                                @foreach ($item['bulan'] as $b)
                                    <span>{{ $b }}</span>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $item['thn_ajaran'] }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                {{ number_format($item['total'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center bg-gray-300 ">
                            Tidak ada data pembayaran
                        </td>
                    </tr>
                @endif
            </tbody>
            <tfoot class="text-center font-bold bg-gray-50">
                <tr>
                    <th colspan="6" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">Total</th>
                    <td class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap">
                        {{ number_format($this->getGrandTotal(), 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
