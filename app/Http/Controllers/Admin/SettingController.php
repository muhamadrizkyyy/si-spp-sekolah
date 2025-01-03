<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $pages = "Setting Website";

    public function index()
    {
        return view('pages.admin.setting.index', ["pages" => $this->pages]);
    }
}
