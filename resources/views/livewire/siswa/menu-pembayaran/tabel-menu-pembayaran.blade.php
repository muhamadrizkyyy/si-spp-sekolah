<div>
    <form wire:submit.prevent='bayar' class="w-fit sm:w-full">
        <div class="action-btn-group flex justify-between my-5">
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

            @if (count($pickBulan) > 0)
                <div class="pembayaran-btn flex gap-x-3 md:block">
                    <button disabled
                        class="border-2 border-myNavy text-gray-500 font-medium rounded-lg text-xs text-pretty md:text-sm w-full sm:w-auto px-10 py-1 md:px-5 md:py-2.5 text-center ">
                        Rp. {{ number_format($total_bayar_spp, 0, ',', '.') }}
                    </button>
                    <button type="submit" wire:click="bayar"
                        class="text-white bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Bayar
                    </button>
                </div>
            @endif
        </div>

        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400" id="">
            <thead class="text-xs text-white uppercase bg-myNavy">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-ss-xl">
                        Bulan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pembayaran
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
                @if ($selected_thn_ajaran)
                    @foreach ($data_pembayaran as $index => $pembayaran)
                        @php
                            $indexBulan = $pembayaran->bulan;
                        @endphp
                        <tr class="odd:bg-blue-100 even:bg-blue-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($index > 5)
                                    {{ $this->setBulanTahun($thn_ajaran_akhir, $indexBulan) }}
                                @else
                                    {{ $this->setBulanTahun($thn_ajaran_awal, $indexBulan) }}
                                @endif
                            </th>

                            {{-- Cari bulan yang sudah terbayar --}}
                            @if ($pembayaran->no_pembayaran != null)
                                <td class="px-6 py-4 text-xs md:text-base">
                                    {{ $this->formatDate($pembayaran->tgl_bayar) }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($pembayaran->status == 'Success')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium text-center me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            {{ $pembayaran->status }}
                                        </span>
                                    @elseif ($pembayaran->status == 'Failed')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium text-center me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                            {{ $pembayaran->status }}
                                        </span>
                                    @elseif ($pembayaran->status == 'Pending')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium text-center me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                            {{ $pembayaran->status }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($pembayaran->status == 'Success' || $pembayaran->status == 'Pending')
                                        -
                                    @else
                                        <input id="checkbox-all-search-{{ $indexBulan }}" type="checkbox"
                                            value="{{ $indexBulan }}" wire:model="pickBulan"
                                            wire:key="pickBulan-{{ $indexBulan }}"
                                            class="w-4 h-4 hidden peer text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search-{{ $indexBulan }}"
                                            class="text-white peer-checked:hidden bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Pilih
                                        </label>

                                        <label for="checkbox-all-search-{{ $indexBulan }}"
                                            class="text-white hidden peer-checked:block bg-gradient-to-l from-myBlueOcean to-mySkyBlue hover:bg-gradient-to-br font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Batal
                                        </label>
                                    @endif
                                </td>
                            @else
                                <td class="px-6 py-4">
                                    -
                                </td>
                                <td class="px-6 py-4">
                                    <span>-</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center">
                                        <input id="checkbox-all-search-{{ $indexBulan }}" type="checkbox"
                                            value="{{ $indexBulan }}" wire:model="pickBulan"
                                            wire:key="pickBulan-{{ $indexBulan }}"
                                            class="w-4 h-4 hidden peer text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search-{{ $indexBulan }}"
                                            class="text-white peer-checked:hidden bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Pilih
                                        </label>

                                        <label for="checkbox-all-search-{{ $indexBulan }}"
                                            class="text-white hidden peer-checked:block bg-gradient-to-l from-myBlueOcean to-mySkyBlue hover:bg-gradient-to-br font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Batal
                                        </label>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center bg-blue-100 rounded-b-xl">
                            Pilih Tahun Ajaran
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </form>
</div>
