<div>
    <form wire:submit.prevent='{{ isset($kelas) && $kelas != null ? 'update(' . $kelas->id . ')' : 'store' }}'>
        <div class="mb-3">
            <label for="kode_kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Kode Kelas
            </label>
            <input type="text" id="kode_kelas"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="XI RPL 2" wire:model='kode_kelas' />
            @error('kode_kelas')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
