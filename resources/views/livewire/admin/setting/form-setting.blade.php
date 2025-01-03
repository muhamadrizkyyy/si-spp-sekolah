<div>
    <form wire:submit.prevent='update'>
        <div class="mb-3 flex gap-x-5">
            <div class="input-group w-full">
                <label for="nama_institusi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Institusi
                </label>
                <input type="text" id="nama_institusi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='nama_institusi' />
                @error('nama_institusi')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="input-group w-full">
                <label for="motto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Motto
                </label>
                <input type="text" id="motto"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='motto' />
                @error('motto')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
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
                @if (
                    $logo->extension() == 'PNG' &&
                        $logo->extension() == 'JPG' &&
                        $logo->extension() == 'JPEG' &&
                        $logo->extension() == 'WEBP')
                    <div class="preview w-full">
                        <img class="h-auto max-w-full" src="{{ $logo->temporaryUrl() }}" alt="Selected image logo">
                    </div>
                @endif
            @else
                <div class="preview w-full">
                    <img class="h-auto max-w-full" src="{{ asset('storage\assets\logo\\' . $old_logo) }}"
                        alt="Selected image logo">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Alamat Institusi
            </label>
            <textarea id="alamat" rows="1"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ketik Disini..." wire:model='alamat'>
            </textarea>
            @error('alamat')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Deskripsi Institusi
            </label>
            <textarea id="deskripsi" rows="2"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ketik Disini..." wire:model='deskripsi'>
            </textarea>
            @error('Deskripsi')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3 flex gap-x-5">
            <div class="input-group w-full">
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nomor Institusi
                </label>
                <input type="text" id="no_telp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='no_telp' />
                @error('no_telp')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="input-group w-full">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email Institusi
                </label>
                <input type="text" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='email' />
                @error('email')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
        <div class="mb-3 flex gap-x-5">
            <div class="input-group w-full">
                <label for="usn_ig" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Username Instagram (Tanpa @)
                </label>
                <input type="text" id="usn_ig"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='usn_ig' />
                @error('usn_ig')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="input-group w-full">
                <label for="usn_fb" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Username Facebook (Tanpa @)
                </label>
                <input type="text" id="usn_fb"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='usn_fb' />
                @error('usn_fb')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="input-group w-full">
                <label for="usn_tiktok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Username Tiktok (Tanpa @)
                </label>
                <input type="text" id="usn_tiktok"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='usn_tiktok' />
                @error('usn_tiktok')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Save
        </button>
    </form>

</div>
