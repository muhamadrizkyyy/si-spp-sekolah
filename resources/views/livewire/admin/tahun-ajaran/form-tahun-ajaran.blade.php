<div>
    <form
        wire:submit.prevent='{{ isset($tahunajaran) && $tahunajaran != null ? 'update(' . $tahunajaran->id . ')' : 'store' }}'>
        <div class="mb-3">
            <label for="thn_ajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tahun Ajaran
            </label>
            <input type="text" id="thn_ajaran"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="2023/2024" wire:model='thn_ajaran' />
            @error('thn_ajaran')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah_spp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Jumlah SPP
            </label>
            <input type="number" id="jumlah_spp"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="150000" wire:model='jumlah_spp' />
            @error('jumlah_spp')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
