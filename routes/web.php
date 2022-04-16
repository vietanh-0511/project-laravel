<?php

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

use App\Http\Controllers\admin_controller;
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', 'admin_controller@login')->name('login');
Route::post('login', 'admin_controller@login_process')->name('login_process');
Route::get('logout', 'admin_controller@logout')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin_middleware']], function () {
    Route::get('admin/{ma_admin}', 'admin_controller@admin')->name('admin');
    Route::post('doi_mk_ad/{ma_admin}', 'admin_controller@doi_mk_ad')->name('doi_mk_ad');
    Route::post('doi_mk_process', 'admin_controller@doi_mk_process')->name('doi_mk_process');
    Route::post('search', 'admin_controller@search')->name('search');
    Route::get('thong_ke', 'thong_ke_controller@thong_ke')->name('thong_ke');


    Route::get('ds_hang_xe', 'hang_xe_controller@ds_hang_xe')->name('ds_hang_xe');
    Route::get('them_hang_xe', 'hang_xe_controller@them_hang_xe')->name('them_hang_xe');
    Route::post('them_hang_xe_xl', 'hang_xe_controller@them_hang_xe_xl')->name('them_hang_xe_xl');
    Route::get('sua_hang_xe/{ma_hang}', 'hang_xe_controller@sua_hang_xe')->name('sua_hang_xe');
    Route::post('sua_hang_xe', 'hang_xe_controller@sua_hx_xl')->name('sua_hx_xl');
    Route::get('xoa_hang_xe/{ma_hang}', 'hang_xe_controller@xoa_hang_xe')->name('xoa_hang_xe');

    Route::get('ds_loai_xe', 'loai_xe_controller@ds_loai_xe')->name('ds_loai_xe');
    Route::get('them_loai_xe', 'loai_xe_controller@them_loai_xe')->name('them_loai_xe');
    Route::post('them_loai_xe_xl', 'loai_xe_controller@them_loai_xe_xl')->name('them_loai_xe_xl');
    Route::get('sua_loai_xe/{ma_loai}', 'loai_xe_controller@sua_loai_xe')->name('sua_loai_xe');
    Route::post('sua_loai_xe', 'loai_xe_controller@sua_loai_xl')->name('sua_loai_xl');
    Route::get('xoa_loai_xe/{ma_loai}', 'loai_xe_controller@xoa_loai_xe')->name('xoa_loai_xe');

    Route::get('ds_tuyen_xe_chay', 'tuyen_duong_controller@ds_tuyen_xe_chay')->name('ds_tuyen_xe_chay');
    Route::get('them_tuyen', 'tuyen_duong_controller@them_tuyen')->name('them_tuyen');
    Route::post('them_tuyen_xl', 'tuyen_duong_controller@them_tuyen_xl')->name('them_tuyen_xl');
    Route::get('sua_tuyen_duong/{ma_tuyen}', 'tuyen_duong_controller@sua_tuyen_duong')->name('sua_tuyen_duong');
    Route::post('sua_tuyen_duong', 'tuyen_duong_controller@sua_tuyen_duong_xl')->name('sua_tuyen_duong_xl');
    Route::get('xoa_tuyen_duong/{ma_tuyen}', 'tuyen_duong_controller@xoa_tuyen_duong')->name('xoa_tuyen_duong');

    Route::get('ds_lich_trinh', 'lich_trinh_controller@ds_lich_trinh')->name('ds_lich_trinh');
    Route::get('them_lich_trinh', 'lich_trinh_controller@them_lich_trinh')->name('them_lich_trinh');
    Route::post('them_lich_trinh_xl', 'lich_trinh_controller@them_lich_trinh_xl')->name('them_lich_trinh_xl');
    Route::get('sua_lich_trinh/{ma_lich_trinh}', 'lich_trinh_controller@sua_lich_trinh')->name('sua_lich_trinh');
    Route::post('sua_lich_trinh', 'lich_trinh_controller@sua_lich_trinh_xl')->name('sua_lich_trinh_xl');
    Route::get('xoa_lich_trinh/{ma_lich_trinh}', 'lich_trinh_controller@xoa_lich_trinh')->name('xoa_lich_trinh');

    Route::get('ds_khach_hang', 'khach_hang_controller@ds_khach_hang')->name('ds_khach_hang');
    Route::get('them_khach_hang', 'khach_hang_controller@them_khach_hang')->name('them_khach_hang');
    Route::post('them_khach_hang_xl', 'khach_hang_controller@them_khach_hang_xl')->name('them_khach_hang_xl');
    Route::get('sua_thong_tin_khach_hang/{ma_khach_hang}', 'khach_hang_controller@sua_thong_tin_khach_hang')->name('sua_thong_tin_khach_hang');
    Route::post('sua_thong_tin_khach_hang', 'khach_hang_controller@sua_thong_tin_khach_hang_xl')->name('sua_thong_tin_khach_hang_xl');
    Route::get('xoa_khach_hang/{ma_khach_hang}', 'khach_hang_controller@xoa_khach_hang')->name('xoa_khach_hang');

    Route::get('ds_xe', 'xe_khach_controller@ds_xe')->name('ds_xe');
    Route::get('chi_tiet_xe/{ma_xe}', 'xe_khach_controller@chi_tiet_xe')->name('chi_tiet_xe');
    Route::post('chi_tiet_xe', 'xe_khach_controller@chi_tiet_xe_xl')->name('chi_tiet_xe_xl');
    Route::post('update_anh', 'xe_khach_controller@update_anh')->name('update_anh');
    Route::get('them_xe', 'xe_khach_controller@them_xe')->name('them_xe');
    Route::post('them_xe_xl', 'xe_khach_controller@them_xe_xl')->name('them_xe_xl');
    Route::get('xoa_xe/{ma_xe}', 'xe_khach_controller@xoa_xe')->name('xoa_xe');

    Route::get('ds_ve', 've_xe_controller@ds_ve')->name('ds_ve');
    Route::get('them_ve', 've_xe_controller@them_ve')->name('them_ve');
    Route::post('them_ve_xl', 've_xe_controller@them_ve_xl')->name('them_ve_xl');
    Route::get('sua_ve/{ma_ve}', 've_xe_controller@sua_ve')->name('sua_ve');
    Route::post('sua_ve', 've_xe_controller@sua_ve_xl')->name('sua_ve_xl');
    Route::get('xoa_ve/{ma_ve}', 've_xe_controller@xoa_ve')->name('xoa_ve');

    Route::get('ds_hoa_don', 'hoa_don_controller@ds_hoa_don')->name('ds_hoa_don');
    Route::get('chi_tiet_hoa_don/{ma_hoa_don}', 'hoa_don_controller@chi_tiet_hoa_don')->name('chi_tiet_hoa_don');
    Route::get('cap_nhat_tinh_trang', 'hoa_don_controller@cap_nhat_tinh_trang')->name('cap_nhat_tinh_trang');

    Route::get('dat_ve_cho_khach', 'khach_hang_controller@dat_ve_cho_khach')->name('dat_ve_cho_khach');
    Route::get('dat_ve/{ma_xe}', 'khach_hang_controller@dat_ve')->name('dat_ve');
    Route::post('xu_ly_dat_ve', 'khach_hang_controller@xu_ly_dat_ve')->name('xu_ly_dat_ve');
});


Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('user_layout', 'user_controller@user_layout')->name('user_layout');
    Route::get('dat_ve/{ma_xe}', 'user_controller@dat_ve')->name('dat_ve');
    Route::get('tim_tuyen', 'user_controller@tim_tuyen')->name('tim_tuyen');
    Route::get('ds_xe', 'user_controller@ds_xe')->name('ds_xe');
    Route::post('search', 'user_controller@search')->name('search');
    Route::post('xu_ly_dat_ve', 'user_controller@xu_ly_dat_ve')->name('xu_ly_dat_ve');
    Route::get('tim_ve_theo_so_dien_thoai', 'user_controller@tim_ve_theo_so_dien_thoai')->name('tim_ve_theo_so_dien_thoai');
    Route::post('tim_ve', 'user_controller@tim_ve')->name('tim_ve');
    Route::get('huy_don_ve/so_dien_thoai={so_dien_thoai}/ma_hoa_don={ma_hoa_don}', 'user_controller@huy_don_ve')->name('huy_don_ve');
});

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
    Route::get('xe_theo_tuyen', 'user_controller@xe_theo_tuyen')->name('xe_theo_tuyen');
    Route::get('so_ghe_trong', 'user_controller@so_ghe_trong')->name('so_ghe_trong');
    Route::get('ghe_da_chon', 'user_controller@ghe_da_chon')->name('ghe_da_chon');
    Route::get('dem_ve', 'user_controller@dem_ve')->name('dem_ve');
    Route::get('thay_anh_xe_khach', 'xe_khach_controller@thay_anh_xe_khach')->name('thay_anh_xe_khach');
});
