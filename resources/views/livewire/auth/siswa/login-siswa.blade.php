<div>
    <section
        class="flex items-center relative justify-center h-screen px-7 {{ isset($pages) ? 'bg-gradient-to-r from-myBlueOcean to-mySkyBlue' : '' }}">
        <div
            class="loginField relative block p-6 pt-12 w-full md:w-[40vw] bg-white border border-gray-200 rounded-[2rem] dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 shadow-lg shadow-slate-500">
            <div
                class="title absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 py-2 px-7 rounded-2xl inline-block bg-gradient-to-r from-myOrange to-myYellowSand w-fit shadow-lg">
                <h1 class="text-center text-white text-2xl font-medium">LOGIN</h1>
            </div>

            @if (session('status') == 'error')
                <div class="flex items-center p-4 mb-4 bg-red-100 text-xs text-red-800 border border-red-300 rounded-2xl dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-center">
                        <span class="font-medium">Alert!</span> {{ session('message') }}
                    </div>
                </div>
            @endif
            <form wire:submit.prevent='login'>
                <div class="mb-6">
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        NISN
                    </label>
                    <input type="text" id="nisn" wire:model='nisn'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="006462xxxx" />
                    @error('nisn')
                        <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Lahir
                    </label>

                    <div class="relative max-w-full">
                        <input autocomplete="off" type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="MM/DD/YYYY" wire:model='tgl_lahir'>
                    </div>

                    @error('tgl_lahir')
                        <p class="mt-0 text-sm text-red-600 dark:text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                {{-- <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                        required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the
                    <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                        conditions</a>.</label>
            </div> --}}
                <button type="submit"
                    class="text-white bg-blue-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-2xl text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                <p class="mt-4 text-sm text-center">
                    Kembali ke
                    <a class="text-myNavy hover:underline" href="{{ route('landing-page') }}">
                        halaman utama
                    </a>
                </p>
            </form>
        </div>

        <div
            class="bantuan-btn group bg-white hover:bg-myNavy absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 bottom-0 rounded-xl transition-all">
            <a href="https://wa.me/62{{ $no_telp }}?text=Halo,%20saya%20ingin%20bertanya..."
                class="inline-flex py-3 px-4 items-center gap-x-5">
                <span class="leading-5 group-hover:text-white font-semibold">Sampaikan <br> kendala anda</span>
                <div class="icon-help p-3 bg-myNavy group-hover:bg-white rounded-lg transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-myNavy text-white"
                        viewBox="0 0 14 14">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M6.987 1.5A3.18 3.18 0 0 0 3.75 4.628V9a1 1 0 0 1-1 1H1.5A1.5 1.5 0 0 1 0 8.5v-2A1.5 1.5 0 0 1 1.5 5h.75v-.39A4.68 4.68 0 0 1 7 0a4.68 4.68 0 0 1 4.75 4.61V5h.75A1.5 1.5 0 0 1 14 6.5v2a1.5 1.5 0 0 1-1.5 1.5h-.75v.5a2.75 2.75 0 0 1-2.44 2.733A1.5 1.5 0 0 1 8 14H6.5a1.5 1.5 0 0 1 0-3H8c.542 0 1.017.287 1.28.718a1.25 1.25 0 0 0 .97-1.218V4.627A3.18 3.18 0 0 0 6.987 1.5"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>
    </section>
</div>
