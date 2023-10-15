<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Halaman_dashboardController;
use App\Http\Controllers\Halaman_manajemen_userController;
use App\Http\Controllers\Halaman_jenis_suratController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // return view('dashboard.dashboard');
// });


// DASHBOARD SURAT
Route::group(['middleware' => ['AdminOnly:admin']], function () {
Route::get('dashboard', [Halaman_dashboardController::class, 'index']);
Route::get('/tambah', [Halaman_dashboardController::class, 'create']);
Route::post('/simpan', [Halaman_dashboardController::class, 'store']);
Route::get('/edit/{id}', [Halaman_dashboardController::class, 'edit']);
Route::post('edit/simpan', [Halaman_dashboardController::class, 'update']);
Route::delete('surat/hapus', [Halaman_dashboardController::class, 'destroy']);

// MANAGE USER
    Route::get('/manage-user', [Halaman_manajemen_userController::class, 'index']);
    Route::get('/tambah-user', [Halaman_manajemen_userController::class, 'create']);
    Route::post('/simpan-user', [Halaman_manajemen_userController::class, 'store']);
    Route::get('/edit-user/{id}', [Halaman_manajemen_userController::class, 'edit']);
    Route::post('/update-user/{id}', [Halaman_manajemen_userController::class, 'update']);
    Route::delete('/hapus-user/{id}', [Halaman_manajemen_userController::class, 'destroy']);

// MANAGE JENIS SURAT
    Route::get('/jenis_surat', [Halaman_jenis_suratController::class, 'index']);
    Route::get('/tambah-jenis', [Halaman_jenis_suratController::class, 'create']);
    Route::post('/simpan-jenis', [Halaman_jenis_suratController::class, 'store']);
    Route::get('/edit-jenis/{id}', [Halaman_jenis_suratController::class, 'edit']);
    Route::post('/update-jenis/{id}', [Halaman_jenis_suratController::class, 'update']);
    Route::delete('/hapus-jenis/{id}', [Halaman_jenis_suratController::class, 'destroy']);
});

// LOGIN FORM
Route::get('/',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'login']);
Route::get('logout', [AuthController::class, 'logout']);