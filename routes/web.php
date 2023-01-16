<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;

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

Route::get('/dashboard',[HomeController::class,'index']);
//PENGELOLAAN PASIEN
Route::get('admin/pasien',[App\Http\Controllers\AdminController::class,'pasien'])
->name('admin.pasien')
->middleware('is_admin');
Route::get('admin/pasien',[App\Http\Controllers\AdminController::class,'submit_pasien'])
->name('admin.pasien.submit')
->middleware('is_admin');

Route::get('admin/pasiens/update',[App\Http\Controllers\AdminController::class,'update_pasien'])
->name('admin.pasien.update')
->middleware('is_admin');

Route::get('admin/ajaxadmin/dataPasien',[App\Http\Controllers\AdminController::class,'getDataPasien']);

Route::post('admin/pasiens/delete/{id}',[App\Http\Controllers\AdminController::class,'delete_pasien'])
->name('admin.pasien.delete')
->middleware('is_admin');


// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('auth.login');
// });
