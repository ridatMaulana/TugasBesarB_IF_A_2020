<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\PasienController;

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

Route::get('/login' ,[LoginController::class,'index']);
Route::get('/logout' ,[LoginController::class,'logout'])->name('logout');
Route::post('/login' ,[LoginController::class,'Login'])->name('login');
// Route::get('/register' ,[LoginController::class,'register']);
// Route::post('/register' ,[LoginController::class,'daftar']);

Route::get('/dashboard',[HomeController::class,'index'])->name('home');
//PENGELOLAAN PASIEN
Route::get('admin/pasien',[PasienController::class,'pasiens'])
->name('admin.pasien');
// ->middleware('is_admin');
Route::post('admin/pasien',[PasienController::class,'submit_pasien'])
->name('admin.pasien.submit');
// ->middleware('is_admin');


Route::patch('admin/pasiens/update',[PasienController::class,'update_pasien'])
->name('admin.pasien.update');
// ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataPasien/{id}',[PasienController::class,'getDataPasien']);

Route::delete('admin/pasiens/delete/{id}',[PasienController::class,'delete_pasien'])
->name('pasien.delete');
// ->middleware('is_admin');

Route::get('admin/print_pasiens',[PasienController::class,'print_pasiens'])
->name('admin.print.pasiens');
// ->middleware('is_admin');

Route::get('admin/books/export',[PasienController::class,'export'])
->name('admin.print.export');
// ->middleware('is_admin');



//crud tindakan
Route::get('/tambah_tindakan', [TindakanController::class, 'tambah_tindakan'])->middleware('admin');
Route::post('/store_tindakan', [TindakanController::class, 'store_tindakan'])->middleware('admin');
Route::post('/hapus_tindakan', [TindakanController::class, 'hapus_tindakan'])->middleware('admin');
Route::get('/edit_tindakan/{id}', [TindakanController::class, 'edit_tindakan'])->middleware('admin');
Route::post('/update_tindakan', [TindakanController::class, 'update_tindakan'])->middleware('admin');
Route::post('/cari_tindakan', [TindakanController::class, 'cari_tindakan']);




// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('auth.login');
// });
