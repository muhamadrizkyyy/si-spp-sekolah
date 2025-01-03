<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $pages = "Setting Website";

    public function index()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.setting.index', ["pages" => $this->pages, "logo" => $logo]);
    }
}
