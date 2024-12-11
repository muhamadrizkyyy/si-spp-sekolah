<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KenaikanKelasController extends Controller
{
    public $pages = 'Manajemen Kenaikan Kelas';

    public function index()
    {
        return view('pages.admin.kenaikanKelas.index', ["pages" => $this->pages]);
    }
}
