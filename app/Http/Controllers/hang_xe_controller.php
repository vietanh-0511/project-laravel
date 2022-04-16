<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hang_xe_model;

class hang_xe_controller extends Controller
{
    //
    public function ds_hang_xe()
    {
        $arr_ad = hang_xe_model::ds_hang_xe();
        return view('admin/hang_xe/hang_xe', compact('arr_ad'));
    }

    public function them_hang_xe()
    {
        return view('admin/hang_xe/them_hang_xe');
    }
    public function them_hang_xe_xl(Request $request)
    {
        $this->validate(
            $request,
            [
                'ten_hang' => 'required|min:1|max:20|unique:hang_xe,ten_hang',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min kí tự',
                'max' => ':attribute không được lớn hơn :max kí tự',
                'unique' => ':attribute đã tồn tại'

            ],
            [
                'ten_hang' => 'Hãng Xe'
            ]
        );
        $hang_xe = new hang_xe_model();
        $hang_xe->ten_hang = $request->ten_hang;
        $hang_xe->them_hang_xe_xl();
        return redirect()->route('admin.ds_hang_xe');
    }
    public function sua_hang_xe($ma_hang)
    {
        $arr_hang = hang_xe_model::get_hang_xe($ma_hang);
        return view('admin/hang_xe/sua_hang_xe', compact('arr_hang'));
    }
    public function sua_hx_xl(Request $request)
    {
        $this->validate(
            $request,
            [
                'ten_hang' => 'required|min:1|max:20|unique:hang_xe,ten_hang',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min kí tự',
                'max' => ':attribute không được lớn hơn :max kí tự',
                'unique' => ':attribute đã tồn tại'

            ],
            [
                'ten_hang' => 'Hãng Xe'
            ]
        );
        $hang_xe = new hang_xe_model();
        $hang_xe->ma_hang = $request->ma;
        $hang_xe->ten_hang = $request->ten_hang;
        $hang_xe->sua_hx_xl();
        return redirect()->route('admin.ds_hang_xe');
    }
    public function xoa_hang_xe($ma_hang)
    {
        $hang_xe = new hang_xe_model();
        $hang_xe->xoa_hang_xe($ma_hang);
        return redirect()->route('admin.ds_hang_xe');
    }
}
