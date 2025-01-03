<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use Illuminate\Http\Request;

class KenaikanKelasController extends Controller
{
    public $pages = 'Manajemen Kenaikan Kelas';

    public function index()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.kenaikanKelas.index', ["pages" => $this->pages, "logo" => $logo]);
    }
}
