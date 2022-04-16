<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khach_hang_model;
use App\xe_khach_model;
use App\hoa_don_model;
use App\hoa_don_chi_tiet_model;

class khach_hang_controller extends Controller
{
    //
    public function ds_khach_hang()
    {
        $arr_ad = khach_hang_model::ds_khach_hang();
        return view('admin/khach_hang/khach_hang', compact('arr_ad'));
    }
    public function them_khach_hang()
    {
        return view('admin/khach_hang/them_khach_hang');
    }
    public function them_khach_hang_xl(Request $request)
    {
        $khach_hang = new khach_hang_model();
        $khach_hang->ma_khach_hang = $request->ma_khach_hang;
        $khach_hang->ten_khach_hang = $request->ten_khach_hang;
        $khach_hang->so_dien_thoai = $request->so_dien_thoai;
        $khach_hang->email = $request->email;
        $khach_hang->them_khach_hang_xl();
        return redirect()->route('admin.ds_khach_hang');
    }
    public function sua_thong_tin_khach_hang($ma_khach_hang)
    {
        $arr_kh = khach_hang_model::get_kh_by_ID($ma_khach_hang);
        return view('admin/khach_hang/sua_thong_tin_khach_hang', compact('arr_kh'));
    }
    public function sua_thong_tin_khach_hang_xl(Request $request)
    {
        $khach_hang = new khach_hang_model();
        $khach_hang->ma_khach_hang = $request->ma_khach_hang;
        $khach_hang->ten_khach_hang = $request->ten_khach_hang;
        $khach_hang->so_dien_thoai = $request->so_dien_thoai;
        $khach_hang->email = $request->email;
        $khach_hang->sua_thong_tin_khach_hang_xl();
        return redirect()->route('admin.ds_khach_hang');
    }
    public function xoa_khach_hang($ma_khach_hang)
    {
        $arr_kh = khach_hang_model::delete_kh($ma_khach_hang);
        return redirect()->route('admin.ds_khach_hang');
    }

    public function dat_ve_cho_khach()
    {
        if (session('success_message')) {
            Alert()->success('Đặt vé thành công', session('success_message'));
            return redirect()->route('admin.dat_ve_cho_khach');
        } 
        $arr_xe = xe_khach_model::ds_xe();
        return view('admin/dat_ve/danh_sach_xe', compact('arr_xe'));
    }

    public function dat_ve($ma_xe)
    {
        $arr_dv = khach_hang_model::dat_ve($ma_xe);
        return view('admin/dat_ve/dat_ve', compact('arr_dv'));
    }

    public function xu_ly_dat_ve(Request $rq)
    {
        $ten_khach_hang = $rq->ten_khach_hang;
        $so_dien_thoai = $rq->so_dien_thoai;
        $email = $rq->email;
        $ngay_kh = $rq->ngay_kh;
        $ma_xe = $rq->ma_xe;
        $so_ve = $rq->so_ve;

        $gia_ve = xe_khach_model::gia_ve($ma_xe);


        $object = new khach_hang_model();
        $object->email = $email;
        $object->so_dien_thoai = $so_dien_thoai;
        $khach_hang = $object->lay_ma_theo_email_va_sdt();

        if (empty($khach_hang)) {
            $object->ten_khach_hang = $ten_khach_hang;
            $object->them_khach_hang_xl();
            $khach_hang = $object->lay_ma_theo_email_va_sdt();
        }
        $ma_khach_hang = $khach_hang[0]->ma_khach_hang;

        $ngay_dat = date('Y-m-d');
        $tong_tien = $gia_ve * $so_ve;
        hoa_don_model::them($ma_khach_hang, $tong_tien, 1, $ngay_dat, $ngay_kh);
        $hoa_don = hoa_don_model::lay_ma_hoa_don_lon_nhat();
        if (empty($hoa_don)) {
            $hoa_don = 1;
        }
        $ma_hoa_don = $hoa_don[0]->max_ma_hoa_don;
        hoa_don_chi_tiet_model::them($ma_hoa_don, $ma_xe, $so_ve, $gia_ve);

        return redirect()->route('admin.dat_ve_cho_khach')->withSuccessMessage('Đặt vé thành công');
    }
}
