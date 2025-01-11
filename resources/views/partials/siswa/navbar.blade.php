<nav class="bg-myNavy dark:bg-gray-900 sticky top-0 w-[95%] rounded-3xl mt-5 mb-10 mx-auto border-b border-gray-200 dark:border-gray-600 transition-all"
    id="navbar">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-2.5">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('storage/assets/logo/' . $logo) }}" class="h-5 md:h-8" alt="Flowbite Logo">
            <span
                class="self-center text-sm md:text-xl font-semibold whitespace-nowrap text-white">{{ $identitas_web->nama_institusi }}</span>
        </a>

        <div class="flex md:hidden space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center self-center text-sm bg-gradient-to-r from-orange-500 to-yellow-400 text-white rounded-lg md:hidden hover:bg-gradient-to-br focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-2 sm:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('dashboardSiswa') }}"
                        class="block p-1 text-white {{ Request::is('dashboard') ? 'border-b-2' : 'hover:border-b-2' }} md:bg-transparent md:dark:text-blue-500"
                        aria-current="page">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('pembayaran.siswa') }}"
                        class="block p-1 text-white {{ Request::is('pembayaran/*') || Request::is('pembayaran') ? 'border-b-2' : 'hover:border-b-2' }}">
                        Pembayaran
                    </a>
                </li>
                <li>
                    <a href="{{ route('riwayat-pembayaran') }}"
                        class="block p-1 text-white {{ Request::is('riwayat-pembayaran/*') || Request::is('riwayat-pembayaran') ? 'border-b-2' : 'hover:border-b-2' }}">
                        Riwayat
                    </a>
                </li>
            </ul>

            <div class="ps-2 pb-2">
                @include('partials.siswa.dropdown-profile', ['size' => 'sm'])
            </div>
        </div>

        {{-- SCREEN MEDIUM (MD) --}}
        <div class="nav-menu md:inline-flex gap-x-4 hidden">
            <div class="hidden md:flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
                @include('partials.siswa.dropdown-profile', ['size' => 'md'])
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                <ul
                    class="flex flex-col p-2 sm:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ route('dashboardSiswa') }}"
                            class="block p-1 text-white {{ Request::is('dashboard') ? 'border-b-2' : 'hover:border-b-2' }} md:bg-transparent md:dark:text-blue-500"
                            aria-current="page">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pembayaran.siswa') }}"
                            class="block p-1 text-white {{ Request::is('pembayaran/*') || Request::is('pembayaran') ? 'border-b-2' : 'hover:border-b-2' }}">
                            Pembayaran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('riwayat-pembayaran') }}"
                            class="block p-1 text-white {{ Request::is('riwayat-pembayaran/*') || Request::is('riwayat-pembayaran') ? 'border-b-2' : 'hover:border-b-2' }}">
                            Riwayat
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
