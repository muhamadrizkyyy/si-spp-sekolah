<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $pages = "Dashboard";

    public function index()
    {

        // $bayar_bulan_ini = Pembayaran::where(  )
        return view("pages.admin.dashboard.index", ["pages" => $this->pages]);
    }
}
