<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\identitasWeb;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $pages = "Data Metode Pembayaran";
    public $logo, $identitas_web;

    public function __construct()
    {
        $identitas_web = identitasWeb::first();
        $this->logo = $identitas_web->logo;
        $this->identitas_web = $identitas_web;
    }

    public function index()
    {
        $pages = $this->pages;
        $logo = $this->logo;
        $identitas_web = $this->identitas_web;

        return view("pages.admin.metodePembayaran.index", compact(
            "pages",
            "logo",
            "identitas_web"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.metodePembayaran.form", ["pages" => $this->pages, "logo" => $this->logo]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodePembayaran = MetodePembayaran::find($id);
        return view("pages.admin.metodePembayaran.form", [
            "pages" => $this->pages,
            "logo" => $this->logo,
            "id_metode" => $metodePembayaran,
        ]);
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
