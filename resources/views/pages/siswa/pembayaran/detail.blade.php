@extends('layouts.mainSiswa')

@section('content')
    <section class="detail-pembayaran flex">
        <div class="mtd-pembayaran w-full md:w-1/2">
            <h1 class="text-3xl font-bold mb-5">Metode Pembayaran</h1>
            <div class="list-mtd-pembayaran">
                <ul class="grid w-full md:grid-rows-2">
                    <li>
                        <input type="radio" id="bni" name="payment" value="I1" class="hidden peer" required />
                        <label for="bni"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">BNI VA</div>
                                <div class="w-full">Menggunakan virtual account BNI</div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="bca" name="payment" value="bca" class="hidden peer">
                        <label for="bca"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">BCA VA</div>
                                <div class="w-full">Menggunakan virtual account BCA</div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="info-pembayaran w-full md:w-1/2 pt-10">
            <h1 class="text-xl font-bold">Detail Pembayaran</h1>
            <div class="bulan-bayar">
                @foreach ($bulanTahun as $item)
                    <div
                        class="inline-flex w-full justify-between text-gray-500 px-5 py-3 bg-white border border-gray-200 rounded-lg">
                        <span class="font-bold">
                            {{ $item }}
                        </span>
                        <span>
                            Rp. {{ $nominal_spp }}
                        </span>
                    </div>
                @endforeach
            </div>
            <div class="total-bayar">
                <div class="text-gray-500 px-5 py-3 bg-white border border-gray-200 rounded-lg">
                    <div class="inline-flex w-full justify-between">
                        <span class="font-bold">Subtotal</span>
                        <span class="">Rp. {{ $total_bayar_spp }}</span>
                    </div>
                    <div class="inline-flex w-full justify-between">
                        <span class="font-bold">Biaya Admin</span>
                        <span class="">Rp. {{ number_format($biaya_admin, 0, ',', '.') }}</span>
                    </div>
                    <div class="inline-flex w-full justify-between">
                        <span class="font-bold text-lg">Grand Total</span>
                        <span class="font-bold text-lg">Rp. {{ number_format($grand_total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <form action="{{ route('proses-pembayaran.siswa') }}" method="POST">
                @csrf
                <input type="hidden" id="payment_type" name="payment_type">
                <input type="hidden" id="pickBulan" value="{{ json_encode($pickBulan) }}" name="pickBulan">
                <input type="hidden" id="grand_total" value="{{ $grand_total }}" name="grand_total">
                <input type="hidden" id="jmlh_bulan" value="{{ count($bulanTahun) }}" name="jmlh_bulan">
                <button type="submit" id="btn-bayar"
                    class="w-full bg-gradient-to-r from-sky-400 via-blue-600 to-blue-700 hover:bg-gradient-to-br px-5 py-2.5 mt-6 text-center text-white shadow-md rounded-full disabled:from-gray-400 disabled:to-gray-400">
                    Bayar SPP
                </button>

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
