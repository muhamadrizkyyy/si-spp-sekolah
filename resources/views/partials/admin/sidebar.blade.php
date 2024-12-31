<nav aria-label="alternative nav">
    <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative z-10 w-full md:w-48 content-center">
        <div
            class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
            <ul class="list-reset flex flex-row md:flex-col md:pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                {{-- Dashboard --}}
                <li class="mr-3 flex-1">
                    <a href="{{ route('dashboardAdmin') }}"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/dashboard') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i
                            class="fa fa-home pr-0 md:pr-3 {{ Request::is('admin/dashboard') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dasboard</span>
                    </a>
                </li>

                {{-- Setting --}}
                <li class="mr-3 flex-1">
                    <a href="#"
                        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/setting') ? 'border-blue-600' : 'border-gray-800' }} hover:border-pink-500">
                        <i
                            class="fas fa-cog pr-0 md:pr-3 {{ Request::is('admin/setting') ? 'text-blue-600' : '' }}"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Setting</span>
                    </a>
                </li>

                {{-- Datamaster --}}
                <li>
                    <button type="button"
                        class="md:flex items-center hidden w-full p-2 text-base text-white transition duration-75 rounded-lg group border-b-2 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Datamaster</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
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

                {{-- Manajemen Pembayaran --}}
                <li class="mt-4">
                    <button type="button"
                        class="md:flex items-center w-full p-2 hidden text-base text-white transition duration-75 rounded-lg group border-b-2 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="manajemen_pembayaran" data-collapse-toggle="manajemen_pembayaran">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Manajemen</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <ul id="manajemen_pembayaran" class="hidden py-2 space-y-2">
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
                            <a href="{{ route('pembayaran') }}"
                                class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/pembayaran') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                <i class="fa fa-money-bill pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Data
                                    Pembayaran</span>
                            </a>
                        </li>
                        {{-- Laporan --}}
                        <button type="button"
                            class="md:flex items-center hidden w-full p-2 text-base text-white transition duration-75 rounded-lg group dark:text-white dark:hover:bg-gray-700"
                            aria-controls="laporan" data-collapse-toggle="laporan">
                            <i class="fa fa-file-invoice-dollar pr-0 md:pr-3"></i>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Laporan</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <ul id="laporan" class="hidden ml-7 space-y-2">
                            <li class="mr-3 flex-1">
                                <a href="{{ route('laporan-persiswa') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/laporan/persiswa') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                    <i class="far fa-circle pr-0 md:pr-3"></i>
                                    <span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Persiswa</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('laporan-perkelas') }}"
                                    class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/laporan/perkelas') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                                    <i class="far fa-circle pr-0 md:pr-3"></i>
                                    <span
                                        class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Perkelas</span>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </li>

                {{-- Dashboard --}}
                <li class="mr-3 flex-1">
                    <a href="{{ route('logout') }}"
                        class="sm:block md:hidden py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 {{ Request::is('admin/dashboard') ? 'border-blue-600' : 'border-gray-800' }} hover:border-purple-500">
                        <i class="fa fa-sign-out-alt pr-0 md:pr-3"></i><span
                            class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:hidden">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
