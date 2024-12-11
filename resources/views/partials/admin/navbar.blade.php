<!--Nav-->
<nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-3 md:pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

    <div class="flex flex-wrap items-center justify-between">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="#" aria-label="Home">
                <span class="text-xl pl-2"><i class="em em-grinning"></i></span>
            </a>
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-evenly flex-1 md:flex-none items-center">
                {{-- Datamaster --}}
                <li>
                    <button type="button"
                        class="flex items-center md:hidden w-full p-2 text-xs text-white transition duration-75 rounded-lg group border-b-2 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="datamaster-nav" data-collapse-toggle="datamaster-nav">
                        <span class="flex-1 me-3 text-left rtl:text-right whitespace-nowrap">Datamaster</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="datamaster-nav"
                        class="absolute z-10 mt-2 hidden bg-gray-800 text-center divide-y divide-gray-100 rounded-lg w-32">
                        {{-- Data Admin --}}
                        <li class="flex-1">
                            <a href="{{ route('admin.index') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2  hover:border-purple-500 {{ Request::is('admin/admin') ? 'border-blue-600' : 'border-gray-800' }}">
                                <i
                                    class="fa fa-users pr-0 md:pr-3 {{ Request::is('admin/admin') ? 'text-blue-600' : '' }}"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Admin</span>
                            </a>
                        </li>
                        {{-- Data Kelas --}}
                        <li class="flex-1">
                            <a href="{{ route('kelas.index') }}"
                                class="block py-1 md:py-3 pl-0 md:pl-1 align-middle text-white no-underline hover:text-white border-b-2 hover:border-red-500 {{ Request::is('admin/kelas') ? 'border-b-2 border-blue-600' : 'border-gray-800' }}">
                                <i
                                    class="fa fa-book pr-0 md:pr-3 {{ Request::is('admin/kelas') ? 'text-blue-600' : '' }}"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Kelas</span>
                            </a>
                        </li>
                        {{-- Data Jurusan --}}
                        <li class="flex-1">
                            <a href="{{ route('jurusan.index') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white {{ Request::is('admin/jurusan') ? 'border-b-2 border-blue-600' : 'border-gray-800' }} ">
                                <i
                                    class="fas fa-book pr-0 md:pr-3 {{ Request::is('admin/jurusan') ? 'text-blue-600' : '' }}"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Data
                                    Jurusan</span>
                            </a>
                        </li>
                        {{-- Data Tahun Ajaran --}}
                        <li class="flex-1">
                            <a href="{{ route('tahunAjaran.index') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 hover:border-purple-500 {{ Request::is('admin/tahun_ajaran') ? 'border-blue-600' : 'border-gray-800' }}">
                                <i
                                    class="fa fa-book pr-0 md:pr-3 {{ Request::is('admin/tahun_ajaran') ? 'text-blue-600' : '' }}"></i>
                                <span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Tahun Ajaran
                                </span>
                            </a>
                        </li>
                        {{-- Data Siswa --}}
                        <li class="flex-1">
                            <a href="{{ route('siswa.index') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 hover:border-purple-500 {{ Request::is('admin/siswa') ? 'border-blue-600' : 'border-gray-800' }}">
                                <i
                                    class="fa fa-user-graduate pr-0 md:pr-3 {{ Request::is('admin/siswa') ? 'text-blue-600' : '' }}"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Siswa</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Profile --}}
                <li class="flex-none md:mr-3">
                    <div class="relative inline-block">
                        <button onclick="toggleDD('manajemen-nav')" class="drop-button text-white py-2 px-2"> <span
                                class="pr-2"><i class="em em-robot_face"></i></span>Hi, {{ Auth::user()->nama }}<svg
                                class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg></button>
                        <div id="manajemen-nav"
                            class="dropdownlist absolute bg-gray-800 text-white -left-10 mt-3 p-3 overflow-auto z-30 invisible">
                            <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.."
                                id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                            <a href="#"
                                class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                    class="fa fa-user fa-fw"></i> Profile</a>
                            <a href="#"
                                class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                    class="fa fa-cog fa-fw"></i> Settings</a>
                            <div class="border border-gray-800"></div>
                            <a href="{{ route('logout') }}"
                                class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                    class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                        </div>
                    </div>
                </li>

                {{-- Manajemen Pembayaran --}}
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 md:hidden text-xs text-white transition duration-75 rounded-lg group border-b-2 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="manajemen_pembayaran-nav" data-collapse-toggle="manajemen_pembayaran-nav">
                        <span class="flex-1 me-3 text-left rtl:text-right whitespace-nowrap">Manajemen</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="manajemen_pembayaran-nav"
                        class="absolute z-10 right-2 mt-2 hidden bg-gray-800 text-center rounded-lg w-32">
                        {{-- Kenaikan Kelas --}}
                        <li class="mr-3 flex-1">
                            <a href="{{ route('kenaikan-kelas') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/kenaikan-kelas') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                <i
                                    class="fa fa-school pr-0 md:pr-3 {{ Request::is('admin/kenaikan-kelas') ? 'text-blue-600' : '' }}"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Kenaikan
                                    Kelas</span>
                            </a>
                        </li>
                        {{-- Pembayaran --}}
                        <li class="mr-3 flex-1">
                            <a href="#"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/pembayaran') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                <i class="fa fa-money-bill pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Pembayaran</span>
                            </a>
                        </li>
                        {{-- Laporan --}}
                        <li class="mr-3 flex-1">
                            <a href="#"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/laporan') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                <i class="fa fa-file-invoice-dollar pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Laporan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>
