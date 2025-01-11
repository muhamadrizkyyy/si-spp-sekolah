<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public $pages = "Data Siswa";

    public function index()
    {
        $logo = identitasWeb::first()->logo;
        return view('pages.admin.siswa.index', ["pages" => $this->pages, "logo" => $logo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo = identitasWeb::first()->logo;
        return view("pages.admin.siswa.form", ["pages" => $this->pages, "logo" => $logo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $tanggal_lahir = Carbon::createFromFormat("Y-m-d", $siswa->tgl_lahir)->format("d m Y");
        $logo = identitasWeb::first()->logo;
        return view("pages.admin.siswa.show", ["pages" => $this->pages, "siswa" => $siswa, "tanggal_lahir" => $tanggal_lahir, "logo" => $logo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $logo = identitasWeb::first()->logo;
        return view("pages.admin.siswa.form", ["pages" => $this->pages, "siswa" => $siswa, "logo" => $logo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
