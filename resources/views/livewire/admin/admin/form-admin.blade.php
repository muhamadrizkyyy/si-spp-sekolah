<div>
    <form wire:submit.prevent='{{ isset($admin) && $admin != null ? 'update(' . $admin->id . ')' : 'store' }}'>
        <div class="mb-3">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nama
            </label>
            <input type="text" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Johny Doe" wire:model='nama' />
            @error('nama')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Email
            </label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="example@gmail.com" wire:model='email' />
            @error('email')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Password {{ $admin != null ? '(isi jika ingin ubah password)' : '' }}
            </label>
            <input type="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ketik Disini..." wire:model='password' />
            @error('password')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Konfirmasi Password untuk tambah data --}}
        @if ($admin == null)
            <div class="mb-3">
                <label for="konfirmasi_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Konfirmasi Password
                </label>
                <input type="password" id="konfirmasi_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik Disini..." wire:model='konfirmasi_password'
                    {{ $password == null ? 'disabled' : '' }} />
                @if ($password != $konfirmasi_password && $konfirmasi_password != null)
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        Password tidak sesuai!
                    </p>
                @elseif ($password == $konfirmasi_password && $konfirmasi_password != null)
                    <p class="mt-0 text-sm text-blue-600 dark:text-blue-500">
                        Password sesuai!
                    </p>
                @endif
                @error('konfirmasi_password')
                    <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        @endif
        <div class="btn-group">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
            <a href="{{ route('admin.index') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Kembali
            </a>
        </div>
    </form>
</div>
