<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KenaikanKelasController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("admin")->group(function () {
    Route::get("login", Login::class)->name("login")->middleware("guest");

    Route::middleware("auth")->group(function () {
        Route::get("/", function () {
            return route("dashboardAdmin");
        });

        Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboardAdmin");
        Route::get("/setting", [SettingController::class, "index"])->name("setting");
        Route::resource("kelas", KelasController::class);
        Route::resource('admin', UserController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('tahunAjaran', TahunAjaranController::class);
        Route::resource('siswa', SiswaController::class);
        Route::get("/kenaikan-kelas", [KenaikanKelasController::class, "index"])->name("kenaikan-kelas");
        Route::get("/pembayaran", [PembayaranController::class, "index"])->name("pembayaran");
        Route::get("/pembayaran/{no_pembayaran}/cetak", [PembayaranController::class, "cetakNota"])->name("pembayaran.cetak");
        Route::prefix("laporan")->group(function () {
            Route::get("/persiswa", [LaporanController::class, "indexPerSiswa"])->name("laporan-persiswa");
            Route::get("/persiswa/cetak", [LaporanController::class, "downloadLaporanPerSiswa"])->name("laporan-persiswa.cetak");

            Route::get("/perkelas", [LaporanController::class, "indexPerKelas"])->name("laporan-perkelas");
            Route::get("/perkelas/cetak", [LaporanController::class, "downloadLaporanPerKelas"])->name("laporan-perkelas.cetak");
        });
        Route::get('/logout', [Login::class, "logout"])->name("logout");
    });
});

// Route::middleware("auth")->prefix("admin")->group(function () {
//     Route::get("/", function () {
//         return route("dashboardAdmin");
//     });

//     Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboardAdmin");
//     Route::resource("kelas", KelasController::class);
//     Route::resource('admin', UserController::class);
//     Route::resource('jurusan', JurusanController::class);
//     Route::resource('tahunAjaran', TahunAjaranController::class);
//     Route::resource('siswa', SiswaController::class);
//     Route::get("/kenaikan-kelas", [KenaikanKelasController::class, "index"])->name("kenaikan-kelas");
//     Route::get("/pembayaran", [PembayaranController::class, "index"])->name("pembayaran");
//     Route::get("/pembayaran/{no_pembayaran}/cetak", [PembayaranController::class, "cetakNota"])->name("pembayaran.cetak");
//     Route::get("/laporan", [LaporanController::class, "index"])->name("laporan");
//     Route::get("/laporan/cetak", [LaporanController::class, "downloadLaporan"])->name("laporan.cetak");
//     Route::get('/logout', [Login::class, "logout"])->name("logout");
// });
