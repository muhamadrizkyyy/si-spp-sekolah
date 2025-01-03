<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $pages = "Dashboard";

    public function index()
    {
        $logo = identitasWeb::first()->logo;
        // $bayar_bulan_ini = Pembayaran::where(  )
        return view("pages.admin.dashboard.index", ["pages" => $this->pages, "logo" => $logo]);
    }
}
