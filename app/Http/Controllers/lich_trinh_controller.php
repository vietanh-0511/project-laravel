<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lich_trinh_model;

class lich_trinh_controller extends Controller
{
    //
    public function ds_lich_trinh()
    {
        $arr_ad = lich_trinh_model::ds_lich_trinh();
        return view('admin/lich_trinh/lich_trinh', compact('arr_ad'));
    }
    public function them_lich_trinh()
    {
        return view('admin/lich_trinh/them_lich_trinh');
    }
    public function them_lich_trinh_xl(Request $request)
    {
        $this->validate(
            $request,
            [
                'gio_xe_di' => 'required:lich_trinh,gio_xe_di',
                'gio_xe_den' => 'required:lich_trinh,gio_xe_den'

            ],
            [
                'required' => ':attribute vui lòng chọn giờ',

            ],
            [
                'gio_xe_di' => '',
                'gio_xe_den' => ''
            ]
        );
        $gio_xe_di = $request->gio_xe_di;
        $gio_xe_den = $request->gio_xe_den;
        $kiem_tra_lich_trinh = lich_trinh_model::kiem_tra_lich_trinh($gio_xe_di, $gio_xe_den);
        if (count($kiem_tra_lich_trinh) != 0) {
            return redirect()->route('admin.them_lich_trinh')->with('error', 'lịch trình này đã tồn tại');
        } else {
        $lich_trinh = new lich_trinh_model();
        $lich_trinh = new lich_trinh_model();
        $lich_trinh->ma_lich_trinh = $request->ma_lich_trinh;
        $lich_trinh->gio_xe_di = $request->gio_xe_di;
        $lich_trinh->gio_xe_den = $request->gio_xe_den;
        $lich_trinh->them_lich_trinh_xl();
        return redirect()->route('admin.ds_lich_trinh');
    }
}
    public function sua_lich_trinh($ma_lich_trinh)
    {
        $arr_lichtrinh = lich_trinh_model::get_lichtrinh_by_ID($ma_lich_trinh);
        return view('admin/lich_trinh/sua_lich_trinh', compact('arr_lichtrinh'));
    }
    public function sua_lich_trinh_xl(Request $request)
    {
        $gio_xe_di = $request->gio_xe_di;
        $gio_xe_den = $request->gio_xe_den;
        $kiem_tra_lich_trinh = lich_trinh_model::kiem_tra_lich_trinh($gio_xe_di, $gio_xe_den);
        if (count($kiem_tra_lich_trinh) != 0) {
            return redirect()->route('admin.them_lich_trinh')->with('error', 'lịch trình này đã tồn tại');
        } else {
        $lich_trinh = new lich_trinh_model();
        $lich_trinh->ma_lich_trinh = $request->ma;
        $lich_trinh->gio_xe_di = $request->gio_xe_di;
        $lich_trinh->gio_xe_den = $request->gio_xe_den;
        $lich_trinh->sua_lich_trinh_xl();
        return redirect()->route('admin.ds_lich_trinh');
    }
}
    public function xoa_lich_trinh($ma_lich_trinh)
    {
        $arr_lichtrinh = lich_trinh_model::xoa_lich_trinh($ma_lich_trinh);
        return redirect()->route('admin.ds_lich_trinh');
    }

}
