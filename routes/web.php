<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\GMapController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThongTinQuanController;
use App\Http\Controllers\LoaiQuanController;

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


// USER homepage
Route::get('/', [TrangchuController::class , 'index']);



// USER MAP
Route::get('/gmap', [GMapController::class , 'index']);



// USER login
Route::get('/login-user', [LoginUserController::class , 'index']);
Route::get('/logout', [LoginUserController::class , 'logout_account']);
Route::post('/login-account', [LoginUserController::class , 'login_account']);

//USER register
Route::get('/register-user', [RegisterUserController::class , 'index']);
Route::post('/register', [RegisterUserController::class , 'regist_account']);



// admin
Route::get('/admin', [AdminController::class , 'index']);


//Thong tin 
Route::get('/them-thong-tin-quan', [ThongTinQuanController::class , 'index_add_in4']);
Route::post('/save-in4', [ThongTinQuanController::class , 'add_in4']);
Route::get('/tat-ca-quan', [ThongTinQuanController::class , 'index_all_in4']);
Route::get('/edit-in4-res/{id_quan}', [ThongTinQuanController::class , 'edit_in4']);
Route::post('/update-in4-res/{id_quan}/{id_vitri}', [ThongTinQuanController::class , 'update_in4']);


//Loai quan
Route::get('/them-loai-quan', [LoaiQuanController::class , 'index_add_cate']);
Route::post('/save-cate-res', [LoaiQuanController::class , 'save_cate_res']);
Route::get('/tat-ca-loai', [LoaiQuanController::class , 'all_cate_res']);
Route::get('/edit-cate-res/{id_loai}', [LoaiQuanController::class , 'edit_cate_res']);
Route::post('/update-cate-res/{id_loai}', [LoaiQuanController::class , 'update_cate_res']);
Route::get('/delete-cate-res/{id_loai}', [LoaiQuanController::class , 'delete_cate_res']);


//Đặt bàn
