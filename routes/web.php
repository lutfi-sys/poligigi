<?php

use App\Http\Controllers\Diagnosa;
use App\Http\Controllers\Login;
use App\Http\Controllers\Pasien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Session;

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

Route::get('beranda/', function () {
    return view('beranda');
})->name('beranda');
// Route::get('login/', function () {
//     return view('login');
// });
Route::get('gejala/', function () {
    return view('gejala');
});
Route::get('/home', [Pasien::class, 'index'])->name('home');
Route::post('/home', [Pasien::class, 'showData'])->name('homebulan');


Route::get('/cetak/{bulan}', [Pasien::class, 'bulan'])->name('cetak');
Route::get('/cetak/{bulan}', [Pasien::class, 'bulan'])->name('cetak');

Route::get('/diagnosa/{user}', [Diagnosa::class, 'show']);
Route::get('/user', [Diagnosa::class, 'show']);
// Route::get('/user', [Diagnosa::class, 'show']);
Route::post('cekdiagnosa', [Diagnosa::class, 'cek']);

Route::get('/profil/{user}', [Pasien::class, 'view']);
Route::get('/user', [Pasien::class, 'view']);

Route::get('/pdf/{user}', [PdfController::class, 'index']);
Route::get('/user', [PdfController::class, 'index']);

Route::get('login/',[Login::class, 'index'])->name('login');;
Route::post('/login/cek',[Login::class, 'cek']);

Route::get('/laporan/{tglawal}/{tglakhir}', [PdfController::class, 'laporan']);
// Route::get('/user', [PdfController::class, 'laporan']);
Route::get('/riwayat/{user}', [PdfController::class, 'riwayat']);
Route::get('/user', [PdfController::class, 'riwayat']);