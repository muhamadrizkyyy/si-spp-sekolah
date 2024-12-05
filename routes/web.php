<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KelasController;
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

Route::get("login", Login::class)->name("login");

Route::middleware("auth")->prefix("admin")->group(function () {
    Route::get("/", function () {
        return route("dashboardAdmin");
    });

    Route::get("/dashboard", [DashboardController::class, 'index'])->name("dashboardAdmin");
    Route::resource("kelas", KelasController::class);
    Route::resource('admin', UserController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::get('/logout', [Login::class, "logout"])->name("logout");
});
