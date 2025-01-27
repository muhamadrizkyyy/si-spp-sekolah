<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DetailPembayaran;
use App\Models\DuitkuLog;
use App\Models\identitasWeb;
use App\Models\MetodePembayaran;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Carbon\Carbon;
use Duitku\Api;
use Duitku\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MenuPembayaranController extends Controller
{
    public $pages = "Menu Pembayaran";
    public $logo, $identitas_web;

    public function __construct()
    {
        $identitas_web = identitasWeb::first();
        $this->logo = $identitas_web->logo;
        $this->identitas_web = $identitas_web;
    }

    public function index()
    {
        $siswaLogin = Siswa::where("nisn", session("nisn"))->first();
        if (session()->has("pickBulan")) {
            return redirect()->route("detail-pembayaran.siswa");
        }

        $no_hp_institusi = ltrim($this->identitas_web->no_telp, "0");
        return view("pages.siswa.pembayaran.index", ["pages" => $this->pages, "logo" => $this->logo, "identitas_web" => $this->identitas_web, "siswaLogin" => $siswaLogin, "no_telp" => $no_hp_institusi]);
    }

    public function indexDetailPembayaran()
    {
        $siswaLogin = Siswa::where("nisn", session("nisn"))->first();

        $metode_bayar = MetodePembayaran::all();

        $pickBulan = session("pickBulan");
        $biaya_admin = 0;
        $bulanTahun = [];
        foreach ($pickBulan as $bulan) {
            if ($bulan > 6) {
                $namaBulan = Carbon::createFromDate(session("thn_ajaran_awal"), $bulan, 1)->format('F Y');
            } else {
                $namaBulan = Carbon::createFromDate(session("thn_ajaran_akhir"), $bulan, 1)->format('F Y');
            }

            $bulanTahun[] = $namaBulan;
        }

        $nominal_spp = number_format(session("nominal_spp"), 0, ",", ".");
        $total_bayar_spp = number_format(session("total_bayar_spp"), 0, ",", ".");
        $grand_total = session("total_bayar_spp") + $biaya_admin;

        // dd($bulanTahun, $nominal_spp, $total_bayar_spp);
        return view("pages.siswa.pembayaran.detail", [
            "pages" => $this->pages,
            "logo" => $this->logo,
            "bulanTahun" => $bulanTahun,
            "pickBulan" => $pickBulan,
            "nominal_spp" => $nominal_spp,
            "total_bayar_spp" => $total_bayar_spp,
            "biaya_admin" => $biaya_admin,
            "grand_total" => $grand_total,
            "identitas_web" => $this->identitas_web,
            "siswaLogin" => $siswaLogin,
            "metodeBayar" => $metode_bayar
        ]);
    }

    public function prosesBayar(Request $request)
    {
        $request->validate([
            "payment_type" => "required",
            "jmlh_bulan" => "required",
            "pickBulan" => "required",
            "grand_total" => "required",
        ]);


        $pickBulan = json_decode($request->pickBulan);

        try {
            DB::beginTransaction();
            $pembayaran = new Pembayaran();
            $pembayaran->no_pembayaran = "00" . random_int(100, 999) . Carbon::now()->format("dmY") . random_int(10, 99);
            $pembayaran->tgl_bayar = Carbon::now();
            $pembayaran->nisn = session("nisn");
            $pembayaran->jmlh_bulan = $request->jmlh_bulan;
            $pembayaran->total_bayar = $request->grand_total;
            $pembayaran->status = "Pending";
            $pembayaran->metode_pembayaran = $request->payment_type;
            $pembayaran->thn_ajaran = session("selected_thn_ajaran");
            $pembayaran->save();

            foreach ($pickBulan as $bulan) {
                DetailPembayaran::create([
                    "bln_bayar" => $bulan,
                    "pembayaran_id" => $pembayaran->id,
                ]);
            }

            //diganti duitkuConfig
            $ngrokUrl = env("NGROK_URL");
            $merchantCode = env("DUITKU_MERCHANT_CODE"); // WAJIB
            $apiKey = env("DUITKU_MERCHANT_KEY"); // WAJIB

            $duitkuConfig = new Config($apiKey, $merchantCode);
            $merchantOrderId = $pembayaran->no_pembayaran; // WAJIB
            $paymentAmount = $pembayaran->total_bayar; // WAJIB
            $paymentMethod = $pembayaran->metode_pembayaran; // WAJIB
            $productDetails = "Pembayaran SPP Tahun Ajaran " . session("selected_thn_ajaran"); //WAJIB
            $email = 'test@test.com'; // WAJIB
            $customerVaName = session("nama"); // tampilan nama pada tampilan konfirmasi bank (WAJIB)
            $callbackUrl = $ngrokUrl . "/pembayaran/duitku-callback"; // url untuk callback
            $returnUrl = $ngrokUrl . "/riwayat-pembayaran/show/"; // url untuk redirect
            $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey); //WAJIB

            //OPSIONAL
            $phoneNumber = '08123456789'; // nomor telepon pelanggan anda (opsional)
            $additionalParam = ''; // opsional
            $merchantUserInfo = ''; // opsional
            $expiryPeriod = 10; // atur waktu kadaluarsa dalam hitungan menit

            $params = array(
                'paymentAmount'     => $paymentAmount,
                'paymentMethod'     => $paymentMethod,
                'merchantOrderId'   => $merchantOrderId,
                'productDetails'    => $productDetails,
                'customerVaName'    => $customerVaName,
                'email'             => $email,
                'callbackUrl'       => $callbackUrl,
                'returnUrl'         => $returnUrl,
            );

            $response_get_transaction = Api::createInvoice($params, $duitkuConfig);
            Log::info("response_get_transaction ", [
                "response_get_transaction" => $response_get_transaction
            ]);

            $data_response = json_decode($response_get_transaction, true);

            DuitkuLog::create([
                "no_pembayaran" => $merchantOrderId,
                "reference" => $data_response["reference"],
                "va_number" => $data_response["vaNumber"],
            ]);


            DB::commit();
            session()->forget(["pickBulan", "nominal_spp", "total_bayar_spp", "thn_ajaran_awal", "thn_ajaran_akhir"]);
            return redirect()->route("riwayat-pembayaran.show", $merchantOrderId);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::info("error in pg duitku ", [
                "message" => $e->getMessage(),
            ]);

            return redirect()->route("pembayaran.siswa")->with("status", "error")->with("msg", "Terjadi kesalahan saat memproses pembayaran : " . $e->getMessage());
        }
    }

    public function batalBayar()
    {
        session()->forget(["pickBulan", "nominal_spp", "total_bayar_spp", "thn_ajaran_awal", "thn_ajaran_akhir"]);
        return redirect()->route("pembayaran.siswa");
    }
}
