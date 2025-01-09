<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\DuitkuLog;
use App\Models\Pembayaran;
use Duitku\Api;
use Duitku\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DuitkuCallbackController extends Controller
{
    /**
      Handle the incoming request.

      @param  \Illuminate\Http\Request  $request
      @return \Illuminate\Http\Response
     */

    //method yang dipanggil saat class dideklarasikan
    public function __invoke(Request $request)
    {
        try {
            $merchantCode = env("DUITKU_MERCHANT_CODE"); // WAJIB
            $apiKey = env("DUITKU_MERCHANT_KEY"); // WAJIB

            $duitkuConfig = new Config($apiKey, $merchantCode);
            $duitkuConfig->callbackParams = $request->all();

            $callback = (string) Api::callback($duitkuConfig);

            Log::info("Duitku Callback: " . $callback);

            header('Content-Type: application/json');
            $notif = json_decode($callback);

            $duitkuLogs = DuitkuLog::where("no_pembayaran", $notif->merchantOrderId)->first();
            $duitkuLogs->payload = $callback;
            $duitkuLogs->save();

            if ($notif->resultCode == "00") {
                $cek_pembayaran = Api::transactionStatus($notif->merchantOrderId, $duitkuConfig);
                Log::info("Cek Pembayaran : ", [
                    "message" => $cek_pembayaran
                ]);
                $verif = json_decode($cek_pembayaran);
                if ($verif->statusCode == "00") {
                    $pembayaran = Pembayaran::where("no_pembayaran", $notif->merchantOrderId)->first();
                    $pembayaran->status = "Success";
                    $pembayaran->save();
                } else if ($verif->statusCode == "02") {
                    $pembayaran = Pembayaran::where("no_pembayaran", $notif->merchantOrderId)->first();
                    $pembayaran->status = "Failed";
                    $pembayaran->save();
                }
            } else if ($notif->resultCode == "01") {
                // Action Pending
            } else {
                // Ignore
            }
        } catch (\Exception $e) {
            http_response_code(400);

            Log::info("Duitku Callback Error", [
                "message" => $e->getMessage()
            ]);
        }
    }
}
