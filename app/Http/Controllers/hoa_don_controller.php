<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hoa_don_model;
use App\admin_model;

class hoa_don_controller extends Controller
{
    //
    public function ds_hoa_don()
    {
        $arr_ad = hoa_don_model::ds_hoa_don();
        return view('admin/hoa_don/hoa_don', compact('arr_ad'));
    }
    public function chi_tiet_hoa_don($ma_hoa_don)
    {
        $arr_hdct = hoa_don_model::chi_tiet_hoa_don($ma_hoa_don);
        return view('admin/hoa_don/hoa_don_chi_tiet', compact('arr_hdct'));
    }

    public function cap_nhat_tinh_trang(Request $request)
    {
        $ma_hoa_don = $request->ma_hoa_don;
        $tinh_trang = $request->tinh_trang;
        hoa_don_model::cap_nhat_tinh_trang_hoa_don($ma_hoa_don, $tinh_trang);
        $arr_hdct = hoa_don_model::chi_tiet_hoa_don($ma_hoa_don);
        return view('admin/hoa_don/hoa_don_chi_tiet', compact('arr_hdct'));
    }
}
