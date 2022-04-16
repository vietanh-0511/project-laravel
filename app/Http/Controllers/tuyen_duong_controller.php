<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tuyen_duong_model;

class tuyen_duong_controller extends Controller
{
    //
    public function ds_tuyen_xe_chay()
    {
        $arr_ad = tuyen_duong_model::ds_tuyen_xe_chay();
        return view('admin/tuyen_duong/tuyen_duong', compact('arr_ad'));
    }
    public function them_tuyen()
    {
        return view('admin/tuyen_duong/them_tuyen');
    }
    public function them_tuyen_xl(Request $request)
    {
        $this->validate(
            $request,
            [
                'tuyen_duong' => 'required|unique:tuyen_duong,tuyen_duong',
                'diem_di' => 'required:diem_di',
                'diem_den' => 'required:diem_den',

            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại'

            ],
            [
                'tuyen_duong' => 'Tuyến đường',
                'diem_di' => 'Điểm đi',
                'diem_den' => 'Điểm đến',
            ]
        );
        $tuyen_duong = $request->tuyen_duong;
        $diem_di = $request->diem_di;
        $diem_den = $request->diem_den;
        $kiem_tra_tuyen_duong = tuyen_duong_model::kiem_tra_tuyen_duong($diem_di, $diem_den);
        if (count($kiem_tra_tuyen_duong) != 0) {
            return redirect()->route('admin.them_tuyen')->with('error', 'tuyến xe này đã tồn tại');
        } else {
            $tuyen_duong = new tuyen_duong_model();
            $tuyen_duong->ma_tuyen = $request->ma_tuyen;
            $tuyen_duong->tuyen_duong = $request->tuyen_duong;
            $tuyen_duong->diem_di = $request->diem_di;
            $tuyen_duong->diem_den = $request->diem_den;
            $tuyen_duong->them_tuyen_xl();
            return redirect()->route('admin.ds_tuyen_xe_chay');
        }
    }
    public function sua_tuyen_duong($ma_tuyen)
    {
        $arr_tuyenduong = tuyen_duong_model::get_tuyenduong_by_ID($ma_tuyen);
        return view('admin/tuyen_duong/sua_tuyen', compact('arr_tuyenduong'));
    }
    public function sua_tuyen_duong_xl(Request $request)
    {
        $tuyen_duong = $request->tuyen_duong;
        $diem_di = $request->diem_di;
        $diem_den = $request->diem_den;
        $kiem_tra_tuyen_duong = tuyen_duong_model::kiem_tra_tuyen_duong($diem_di, $diem_den);
        if (count($kiem_tra_tuyen_duong) != 0) {
            return redirect()->route('admin.ds_tuyen_xe_chay')->with('error', 'tuyến xe này đã tồn tại');
        } else {
        $tuyen_duong = new tuyen_duong_model();
        $tuyen_duong->ma_tuyen = $request->ma_tuyen;
        $tuyen_duong->tuyen_duong = $request->tuyen_duong;
        $tuyen_duong->diem_di = $request->diem_di;
        $tuyen_duong->diem_den = $request->diem_den;
        $tuyen_duong->sua_tuyen_duong_xl();
        return redirect()->route('admin.ds_tuyen_xe_chay');
    }
}
    public function xoa_tuyen_duong($ma_tuyen)
    {
        $arr_tuyenduong = tuyen_duong_model::xoa_tuyen_duong($ma_tuyen);
        return redirect()->route('admin.ds_tuyen_xe_chay');
    }
}
