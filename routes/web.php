<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\ObatController;

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

Route::get('admin/books/import',[PasienController::class,'import'])
->name('admin.print.import');
// ->middleware('is_admin');


//PENGELOLAAN KARYAWAN
Route::get('admin/karyawan',[PasienController::class,'karyawans'])
->name('admin.karyawan');
// ->middleware('is_admin');
Route::post('admin/karyawan',[PasienController::class,'submit_karyawan'])
->name('admin.karyawan.submit');
// ->middleware('is_admin');


Route::patch('admin/karyawans/update',[PasienController::class,'update_karyawan'])
->name('admin.karyawan.update');
// ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataKaryawan/{id}',[PasienController::class,'getDataKaryawan']);

Route::delete('admin/karyawans/delete/{id}',[PasienController::class,'delete_karyawan'])
->name('karyawan.delete');
// ->middleware('is_admin');

Route::get('admin/print_karyawans',[PasienController::class,'print_karyawans'])
->name('admin.print.karyawans');
// ->middleware('is_admin');

Route::get('admin/karyawans/export',[PasienController::class,'export'])
->name('admin.print.export');
// ->middleware('is_admin');

Route::post('admin/pasien/import',[PasienController::class,'import'])
->name('admin.print.import');
// ->middleware('is_admin');



//crud tindakan
Route::get('/tindakan',[TindakanController::class, 'index'])->name('admin.tindakan');
// ->middleware('admin');
Route::post('/store_tindakan', [TindakanController::class, 'store_tindakan'])->name('tambah.tindakan');
// ->middleware('admin');
Route::post('/hapus_tindakan/{id}', [TindakanController::class, 'hapus_tindakan']);
// ->middleware('admin');
Route::get('/get_tindakan/{id}', [TindakanController::class, 'get_tindakan']);
// ->middleware('admin');
Route::patch('/update_tindakan', [TindakanController::class, 'update_tindakan'])->name('ubah.tindakan');
// ->middleware('admin');

Route::patch('diagnosa/update',[DiagnosaController::class,'change'])->name('diagnosa.change');
Route::resource('/diagnosa', DiagnosaController::class);

Route::patch('obat/update',[ObatController::class,'change'])->name('obat.change');
Route::resource('/obat', ObatController::class);

// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('auth.login');
// });
