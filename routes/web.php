<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PkaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataUmumController;
use App\Http\Controllers\DataAparatController;
use App\Http\Controllers\TpkController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\RkpController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\tesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    // Home route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route resource
    Route::resource('tes', tesController::class);
    Route::resource('profil', profilController::class);
    Route::resource('dataUmum', DataUmumController::class);
    Route::resource('dataAparat', DataAparatController::class);
    Route::resource('pka', PkaController::class);
    Route::resource('tpk', TpkController::class);
    Route::resource('penyedia', PenyediaController::class);
    Route::resource('beritaAcara', BeritaAcaraController::class);
    Route::resource('rkp', RkpController::class);
    Route::resource('pengumuman', PengumumanController::class);

    // Static routes
    Route::get('/siapswa', function () {
        return view('siapSwa');
    });
    
    Route::get('/siapsedia', function () {
        return view('siapSedia');
    });

    Route::get('/laksanaSwa', function () {
        return view('laksanaSwa');
    });
});

// Route untuk login dan logout (tanpa middleware auth)
Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');