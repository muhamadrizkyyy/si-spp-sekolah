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
            @if ($this->selected_kelas != null || $this->selected_thn_ajaran != null)
                <button class="btn text-gray-600 font-bold py-2 rounded" type="button" wire:click="rmSelected">
                    <i class="fas fa-times"></i>
                </button>
            @endif
        </div>
        <div class="search">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fa fa-user pr-0 md:pr-3"></i>
                </div>
                <input type="text" id="simple-search" wire:model='search' wire:key='search'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by name / nisn..." />
            </div>
        </div>
    </div>

    <form wire:submit.prevent='update'>
        <div class="overflow-x-auto">
            <table class="w-max min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                id="">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NISN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kelas Terakhir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kelas Baru
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tahun Ajaran Baru
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data_siswa)
                        {{-- Cek apakah data siswa ditemukan --}}
                        @if ($data_siswa->isNotEmpty())
                            @foreach ($data_siswa as $key => $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $key + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <input type="hidden" wire:model='nisn.{{ $key }}'>
                                        {{ $item->nisn }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span>{{ $item->kelas->kode_kelas }}</span>
                                        <br>
                                        <span>TA {{ $item->thn_ajaran }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <select id="Kelas" wire:model='kelas_baru.{{ $item->id }}'
                                            wire:key='kelas_baru'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>.: Pilih Kelas:.</option>
                                            @foreach ($data_kelas as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == 1 ? 'selected' : '' }}>{{ $item->kode_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
                                            <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </td>
                                    <td class="px-6 py-4">
                                        <select id="thn_ajaran" wire:model='thn_ajaran_baru'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>.: Pilih Tahun Ajaran :.</option>
                                            @foreach ($data_thn_ajaran as $item)
                                                <option value="{{ $item->thn_ajaran }}">{{ $item->thn_ajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('thn_ajaran')
                                            <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td colspan="4"></td>
                                <td class="px-6 py-4 text-center">
                                    <div class="pick_kelas">
                                        <select id="pick_Kelas" wire:model='pick_all_kelas' wire:key='pick-all-kelas'
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>.: Pilih Kelas:.</option>
                                            @foreach ($data_kelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->kode_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="pick_kelas"
                                            class="block mb-2 text-xs font-medium text-red-600 dark:text-white">
                                            Pilih untuk terapkan semua
                                        </label>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center bg-gray-200">Tidak Ada Data Siswa</td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center bg-gray-200">
                                Cari Siswa Berdasarkan Tahun Ajaran / Kelas / Nama / NISN
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
    </form>

</div>
