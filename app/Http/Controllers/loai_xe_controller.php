<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loai_xe_model;

class loai_xe_controller extends Controller
{
    //
    public function ds_loai_xe()
    {
        $arr_ad = loai_xe_model::ds_loai_xe();
        return view('admin/loai_xe/loai_xe', compact('arr_ad'));
    }
    public function them_loai_xe()
    {
        return view('admin/loai_xe/them_loai_xe');
    }
    public function them_loai_xe_xl(Request $request)
    {
        $this->validate(
            $request,
            [
                'loai_xe' => 'required|unique:loai_xe,loai_xe',
                'so_ghe' => 'required|unique:loai_xe,so_ghe',
            ],
            [
                'required' => ':attribute không được để trống',
                'unique' => ':attribute đã tồn tại'

            ],
            [
                'loai_xe' => 'Loại xe',
                'so_ghe' => 'Số ghế xe'
            ]
        );
        $loai_xe = $request->loai_xe;
        $so_ghe = $request->so_ghe;
        $kiem_tra_loai_xe = loai_xe_model::kiem_tra_loai_xe($loai_xe, $so_ghe);
        if (count($kiem_tra_loai_xe) != 0) {
            return redirect()->route('admin.them_loai_xe')->with('error', 'Loại xe đã tồn tại');
        } else {
            $loai_xe = new loai_xe_model();
            $loai_xe->ma_loai = $request->ma_loai;
            $loai_xe->loai_xe = $request->loai_xe;
            $loai_xe->so_ghe = $request->so_ghe;
            $loai_xe->them_loai_xe_xl();
            return redirect()->route('admin.ds_loai_xe');
        }
    }
    public function sua_loai_xe($ma_loai)
    {
        $arr_loai_xe = loai_xe_model::get_loai_xe($ma_loai);
        return view('admin/loai_xe/sua_loai_xe', compact('arr_loai_xe'));
    }
    public function sua_loai_xl(Request $request)
    {
        $loai_xe = $request->loai_xe;
        $so_ghe = $request->so_ghe;
        $kiem_tra_loai_xe = loai_xe_model::kiem_tra_loai_xe($loai_xe, $so_ghe);
        if (count($kiem_tra_loai_xe) != 0) {
            return redirect()->route('admin.ds_loai_xe')->with('error', 'Loại xe đã tồn tại');
        } else {
            $loai_xe = new loai_xe_model();
            $loai_xe->ma_loai = $request->ma_loai;
            $loai_xe->loai_xe = $request->loai_xe;
            $loai_xe->so_ghe = $request->so_ghe;
            $loai_xe->sua_loai_xl();
            return redirect()->route('admin.ds_loai_xe');
        }
    }
    public function xoa_loai_xe($ma_loai)
    {
        $loai_xe = new loai_xe_model();
        $loai_xe->xoa_loai_xe($ma_loai);
        return redirect()->route('admin.ds_loai_xe');
    }
}
