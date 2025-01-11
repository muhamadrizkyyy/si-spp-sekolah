@extends('layouts.mainSiswa')

@section('content')
    <section class="detail-pembayaran flex flex-col h-screen md:flex-row gap-x-5 px-7 md:px-12 pb-16 mb-10">
        <div class="mtd-pembayaran w-full md:w-1/2">
            <div class="inline-flex gap-x-3 items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-myNavy h-9" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M9.944 3.25h4.112c1.838 0 3.294 0 4.433.153c1.172.158 2.121.49 2.87 1.238c.748.749 1.08 1.698 1.238 2.87c.09.673.127 1.456.142 2.363a.8.8 0 0 1 .004.23q.009.848.007 1.84v.112c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433v-.112q-.002-.992.007-1.84a.8.8 0 0 1 .003-.23c.016-.907.053-1.69.143-2.363c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c1.14-.153 2.595-.153 4.433-.153m-7.192 7.5q-.002.582-.002 1.25c0 1.907.002 3.262.14 4.29c.135 1.005.389 1.585.812 2.008s1.003.677 2.009.812c1.028.138 2.382.14 4.289.14h4c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812s.677-1.003.812-2.009c.138-1.028.14-2.382.14-4.289q0-.668-.002-1.25zm18.472-1.5H2.776c.02-.587.054-1.094.114-1.54c.135-1.005.389-1.585.812-2.008s1.003-.677 2.009-.812c1.028-.138 2.382-.14 4.289-.14h4c1.907 0 3.262.002 4.29.14c1.005.135 1.585.389 2.008.812s.677 1.003.812 2.009c.06.445.094.952.114 1.539M5.25 16a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75m6.5 0a.75.75 0 0 1 .75-.75H14a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="text-xl md:text-3xl font-bold text-myNavy">Metode Pembayaran</h1>
            </div>
            <div class="list-mtd-pembayaran h-[25vh] md:h-[80vh] overflow-y-auto border-2 border-myNavy rounded-xl">
                <ul class="grid w-full md:grid-rows-2">
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer"
                            required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer"
                            required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer"
                            required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 border-b-2 border-transparent peer-checked:bg-blue-100 peer-checked:bg-opacity-50 cursor-pointer hover:bg-gray-100 rounded-t-xl">
                            <div class="flex gap-x-5">
                                <div class="w-2/12 self-center">
                                    <img src="{{ asset('storage/assets/pay-logo/bni.png') }}" alt="logo-bni">
                                </div>
                                <div class="info-bank">
                                    <div class="w-full text-md md:text-lg font-semibold">BNI VA</div>
                                    <div class="w-full text-sm md:text-base">Menggunakan virtual account BNI</div>
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="info-pembayaran w-full md:w-1/2 mt-5 md:mt-0 md:pt-10">
            <h1 class="text-xl md:text-2xl font-bold text-myNavy mb-2">Detail Pembayaran</h1>
            <div class="bulan-bayar {{ count($bulanTahun) >= 5 ? 'h-full overflow-y-auto' : '' }}">
                @foreach ($bulanTahun as $item)
                    <div
                        class="inline-flex w-full justify-between items-center text-black px-5 py-3 bg-white border-2 mb-3 border-myNavy rounded-lg">
                        <span class="font-bold text-sm">
                            {{ $item }}
                        </span>
                        <span class="text-sm">
                            Rp. {{ $nominal_spp }}
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="total-bayar">
                <div class="text-white px-5 py-3 bg-myNavy border border-gray-200 rounded-lg">
                    <div class="inline-flex w-full text-xs justify-between">
                        <span class="font-bold">Subtotal</span>
                        <span class="">Rp. {{ $total_bayar_spp }}</span>
                    </div>
                    <div class="inline-flex w-full text-xs justify-between">
                        <span class="font-bold">Biaya Admin</span>
                        <span class="">Rp. {{ number_format($biaya_admin, 0, ',', '.') }}</span>
                    </div>
                    <div class="inline-flex w-full text-sm md:text-lg justify-between">
                        <span class="font-bold">Grand Total</span>
                        <span class="font-bold">Rp. {{ number_format($grand_total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('proses-pembayaran.siswa') }}" method="POST">
                @csrf
                <input type="hidden" id="payment_type" name="payment_type">
                <input type="hidden" id="pickBulan" value="{{ json_encode($pickBulan) }}" name="pickBulan">
                <input type="hidden" id="grand_total" value="{{ $grand_total }}" name="grand_total">
                <input type="hidden" id="jmlh_bulan" value="{{ count($bulanTahun) }}" name="jmlh_bulan">
                <div class="flex gap-x-4">
                    <button type="submit" id="btn-bayar"
                        class="w-full bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br px-5 py-2.5 mt-4 text-center text-white shadow-md rounded-full disabled:from-gray-400 disabled:to-gray-400">
                        Bayar SPP
                    </button>
                    <a id="btn-batal" href="{{ route('pembayaran.batal') }}"
                        class="w-full bg-gradient-to-r from-myOrange to-myYellowSand hover:bg-gradient-to-br px-5 py-2.5 mt-4 text-center text-white shadow-md rounded-full disabled:from-gray-400 disabled:to-gray-400">
                        Batalkan
                    </a>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            checkPaymentType()
            $('input[name="payment"]').change(function() {
                var paymentMethod = $('input[name="payment"]:checked').val();
                console.log(paymentMethod);

                $('#payment_type').val(paymentMethod);

                checkPaymentType()
            })

            function checkPaymentType() {
                if ($('#payment_type').val() == '') {
                    $('#btn-bayar').attr('disabled', true);
                } else {
                    $('#btn-bayar').attr('disabled', false);
                }
            }


        })
    </script>
@endsection
