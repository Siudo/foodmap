<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\GMapController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThongTinQuanController;
use App\Http\Controllers\LoaiQuanController;
use App\Http\Controllers\DatBanController;
use App\Http\Controllers\LoginAdminController;
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



//Đặt bàn

Route::get('/datban/{id_quan}', [DatBanController::class , 'index_datban']);
Route::post('/save-datban/{id_quan}', [DatBanController::class , 'add_datban']);
Route::get('/profile', [DatBanController::class , 'index_profile']);
Route::get('/profile-datban', [DatBanController::class , 'profile_datban']);
Route::get('/profile-menu/{id_datban}', [DatBanController::class , 'profile_menu']);
Route::post('/save-mon', [DatBanController::class , 'save_mon']);

// USER login
Route::get('/login-user', [LoginUserController::class , 'index']);
Route::get('/logout', [LoginUserController::class , 'logout_account']);
Route::post('/login-account', [LoginUserController::class , 'login_account']);

//USER register
Route::get('/register-user', [RegisterUserController::class , 'index']);
Route::post('/register', [RegisterUserController::class , 'regist_account']);



// admin
Route::get('/admin', [ThongTinQuanController::class , 'dashboard']);
Route::get('/thay-doi-vitri', [ThongTinQuanController::class , 'edit_location']);
Route::post('/save-location/{id_vitri}/{id_quan}', [ThongTinQuanController::class , 'save_location']);


//ThucDon
Route::get('/them-loai-thucdon', [ThongTinQuanController::class , 'index_add_cate_menu']);
Route::post('/save-cate-menu', [ThongTinQuanController::class , 'save_cate_menu']);
Route::get('/tatca-loai-thucdon', [ThongTinQuanController::class , 'index_all_cate_menu']);

Route::get('/them-thucdon', [ThongTinQuanController::class , 'index_add_menu']);
Route::post('/save-menu', [ThongTinQuanController::class , 'save_menu']);

Route::get('/them-mon', [ThongTinQuanController::class , 'index_add_dish']);
Route::post('/save-dish', [ThongTinQuanController::class , 'save_dish']);
Route::get('/tatca-mon', [ThongTinQuanController::class , 'all_menu']);
Route::get('/edit-mon/{id_thucdon}', [ThongTinQuanController::class , 'index_edit_dish']);
Route::post('/update-dish/{id_thucdon}', [ThongTinQuanController::class , 'update_dish']);



//Thong tin 
Route::get('/them-thong-tin-quan', [ThongTinQuanController::class , 'index_add_in4']);
Route::post('/save-in4', [ThongTinQuanController::class , 'add_in4']);
Route::get('/tat-ca-quan', [ThongTinQuanController::class , 'index_all_in4']);
Route::get('/edit-in4-res/{id_quan}', [ThongTinQuanController::class , 'edit_in4']);
Route::post('/update-in4-res/{id_quan}/{id_vitri}', [ThongTinQuanController::class , 'update_in4']);
Route::get('/delete-in4-res/{id_quan}', [ThongTinQuanController::class , 'delete_in4_res']);
Route::get('/chitiet-datban', [ThongTinQuanController::class , 'detail_order']);
Route::get('/xacnhan/{id_datban}', [ThongTinQuanController::class , 'xacnhan_detail_order']);
Route::get('/dashboard', [ThongTinQuanController::class , 'dashboard']);
//Loai quan
Route::get('/them-loai-quan', [LoaiQuanController::class , 'index_add_cate']);
Route::post('/save-cate-res', [LoaiQuanController::class , 'save_cate_res']);
Route::get('/tat-ca-loai', [LoaiQuanController::class , 'all_cate_res']);
Route::get('/edit-cate-res/{id_loai}', [LoaiQuanController::class , 'edit_cate_res']);
Route::post('/update-cate-res/{id_loai}', [LoaiQuanController::class , 'update_cate_res']);
Route::get('/delete-cate-res/{id_loai}', [LoaiQuanController::class , 'delete_cate_res']);



//Login Admin

Route::get('/login-admin', [LoginAdminController::class , 'index_login']);

Route::post('/check-login', [LoginAdminController::class , 'check_login']);

Route::get('/logout-admin', [LoginAdminController::class , 'logout_admin']);




//Ban
Route::get('/them-ban', [tableController::class , 'index_add_table']);