<div>
    <form
        wire:submit.prevent='{{ isset($metodePembayaran) && $metodePembayaran != null ? 'update(' . $metodePembayaran->id . ')' : 'store' }}'>
        <div class="mb-3 flex gap-x-5 items-center">
            <div class="input w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_logo">
                    Upload Logo
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_logo" type="file" wire:model='logo'>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                    PNG / JPG / JPeG / WEBP
                </p>
                @error('logo')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            @if ($logo)
                <div class="preview w-full">
                    <img class="h-auto max-w-full" src="{{ $logo->temporaryUrl() }}" alt="Selected image logo">
                </div>
            @else
                @if ($old_logo && $old_logo != '-')
                    <div class="preview w-full">
                        <img class="h-auto max-w-full" src="{{ asset('storage/assets/pay-logo/' . $old_logo) }}"
                            alt="Selected image logo">
                    </div>
                @endif
            @endif
        </div>
        <div class="mb-3">
            <label for="kode_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Kode Pembayaran (Disesuaikan dari payment gateway)
            </label>
            <input type="text" id="kode_pembayaran"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="l1" wire:model='kode_pembayaran' />
            @error('kode_pembayaran')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Jenis Pembayaran
            </label>
            <input type="text" id="jenis_pembayaran"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="BRI VA" wire:model='jenis_pembayaran' />
            @error('jenis_pembayaran')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Keterangan
            </label>
            <input type="text" id="keterangan"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="BANK_TF" wire:model='keterangan' />
            @error('keterangan')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="btn-group">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
            <a href="{{ route('metodePembayaran.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Kembali
            </a>
        </div>
    </form>
</div>
