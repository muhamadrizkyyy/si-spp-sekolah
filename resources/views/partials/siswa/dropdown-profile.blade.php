<button data-dropdown-toggle="profile {{ $size }}"
    class="text-white bg-myBlue focus:ring-4 focus:ring-blue-300 font-medium rounded-md lg:rounded-xl text-sm px-2.5 lg:px-5 py-1.5 lg:py-3 md:ms-3.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    <div class="flex gap-x-3">
        <img src="{{ asset('storage/assets/bg/avatar.jpg') }}" alt="..."
            class="w-8 rounded bg-gray-300 aspect-square">
        <div class="profile flex flex-col text-left">
            <span class="nama_siswa text-xs">{{ $siswaLogin->nama }}</span>
            <span class="kelas text-xs">{{ $siswaLogin->kelas->kode_kelas }}</span>
        </div>
    </div>
</button>

<!-- Dropdown Profile -->
<div id="profile {{ $size }}"
    class="z-10 hidden bg-myNavy divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
        <li>
            <a href="{{ route('profile.siswa') }}"
                class="block px-4 py-2 text-white hover:text-blue-950 hover:bg-blue-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Profile
            </a>
        </li>
        <li>
            <a href="{{ route('logout.siswa') }}"
                class="block px-4 py-2 text-white hover:text-blue-950 hover:bg-blue-100 dark:hover:bg-gray-600 dark:hover:text-white">
                Sign out
            </a>
        </li>
    </ul>
</div>
