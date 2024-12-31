<div>
    <form wire:submit.prevent='{{ isset($siswa) && $siswa != null ? 'update(' . $siswa->id . ')' : 'store' }}'>
        <div class="mb-3">
            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                NISN
            </label>
            <input type="text" id="nisn"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="006463xxxx" wire:model='nisn' />
            @error('nisn')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nama
            </label>
            <input type="text" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Muhamad Ilham" wire:model='nama' />
            @error('nama')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Gender
            </label>

            <div class="flex gap-x-3">
                <div class="flex items-center">
                    <input id="laki" type="radio" value="L" wire:model='gender'
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Laki Laki
                    </label>
                </div>
                <div class="flex items-center">
                    <input checked id="perempuan" type="radio" value="P" wire:model='gender'
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        Perempuan
                    </label>
                </div>
            </div>

            @error('gender')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal Lahir {{ $tgl_lahir }}
            </label>

            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="MM/DD/YYYY" wire:model='tgl_lahir'>
            </div>

            @error('tgl_lahir')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Alamat
            </label>
            <textarea id="alamat" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Alamat..." wire:model='alamat'></textarea>
            @error('alamat')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Kelas
            </label>
            <select id="Kelas" wire:model='kelas'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>.: Pilih Kelas:.</option>
                @foreach ($data_kelas as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_kelas }}</option>
                @endforeach
            </select>
            @error('kelas')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Jurusan
            </label>
            <select id="jurusan" wire:model='jurusan'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>.: Pilih Jurusan :.</option>
                @foreach ($data_jurusan as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_jurusan }}</option>
                @endforeach
            </select>
            @error('jurusan')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thn_ajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Tahun Ajaran Awal Masuk
            </label>
            <select id="thn_ajaran" wire:model='thn_ajaran'
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>.: Pilih Tahun Ajaran :.</option>
                @foreach ($data_thn_ajaran as $item)
                    <option value="{{ $item->thn_ajaran }}">{{ $item->thn_ajaran }}</option>
                @endforeach
            </select>
            @error('thn_ajaran')
                <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
