<div>
    <div class="flex flex-wrap">
        {{-- Count Siswa --}}
        <div class="w-full md:w-1/2 p-6 cursor-pointer" id="siswaCount" onclick="redirectTo('{{ route('siswa.index') }}')">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-blue-200 to-blue-100 hover:bg-gradient-to-br border-b-4 border-blue-800 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-blue-800"><i class="fa fa-users fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">Total Siswa</h2>
                        <p class="font-bold text-3xl"> {{ $countSiswa }}
                            {{-- <span class="text-blue-800">
                                <i class="fas fa-caret-up"></i>
                            </span> --}}
                        </p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        {{-- Count Admin --}}
        <div class="w-full md:w-1/2 p-6 cursor-pointer" id="adminCount"
            onclick="redirectTo('{{ route('admin.index') }}')">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-pink-200 to-pink-100 hover:bg-gradient-to-br border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-user-cog fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">Total Admin</h2>
                        <p class="font-bold text-3xl">{{ $countAdmin }}
                            {{-- <span class="text-pink-500">
                                <i class="fas fa-exchange-alt"></i>
                            </span> --}}
                        </p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        {{-- <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">New Users</h2>
                        <p class="font-bold text-3xl">2 <span class="text-yellow-600"><i
                                    class="fas fa-caret-up"></i></span>
                        </p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">Server Uptime</h2>
                        <p class="font-bold text-3xl">152 days</p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">To Do List</h2>
                        <p class="font-bold text-3xl">7 tasks</p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div> --}}
    </div>

    <div class="amount-payment cursor-pointer" id="amount-payment"
        onclick="redirectTo('{{ route('laporan-keuangan') }}')">
        <div class="w-full px-6 py-2">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-green-200 to-green-100 hover:bg-gradient-to-br border-b-4 border-green-800 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-800"><i
                                class="fas fa-money-bill-wave fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-balance text-gray-600">Total Pembayaran Bulan
                            {{ $bulanSekarang }}</h2>
                        <p class="font-bold text-3xl"> Rp. {{ $total_bayar }}
                            {{-- <span class="text-green-800">
                                <i class="fas fa-caret-up"></i>
                            </span> --}}
                        </p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>
</div>
