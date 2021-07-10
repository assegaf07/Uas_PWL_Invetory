<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PembelianController;

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
    return view('auth.login');
});

// Route::get('/beranda','HomeController@index');

Route::resource('/produk',ProdukController::class);
// Route::resource('/buyer',BuyerController::class);
Route::resource('/kategori',KategoriController::class);
// Route::resource('/pembelian',PembelianController::class);
Route::resource('/produsen',ProdusenController::class);
Route::resource('/satuan',SatuanController::class);

// route export pdf
Route::get('generate-pdf', [ProdukController::class, 'generatePDF']);
Route::get('expdf2', [ProdukController::class, 'expdf2']);
Route::get('expdf', [ProdusenController::class, 'expdf']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
