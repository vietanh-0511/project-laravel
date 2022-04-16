<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ve_xe_model;
use App\xe_khach_model;
class ve_xe_controller extends Controller
{
    //
    public function ds_ve()
    {
        $arr_ad = ve_xe_model::ds_ve();
        return view('admin/ve_xe/ds_ve_xe', compact('arr_ad'));
    }
    public function them_ve()
    {
        $arr_xe = xe_khach_model::ds_xe();
        return view('admin/ve_xe/them_ve', compact('arr_xe'));
    }
    public function them_ve_xl(Request $them)
    {
        $ve_xe = new ve_xe_model();
        $ve_xe->ma_ve  = $them->ma_ve;
        $ve_xe->ma_xe  = $them->ma_xe;
        $ve_xe->them_ve_xl();
        return redirect()->route('admin.ds_ve');
    }
    public function sua_ve($ma_ve)
    {
        $arr_ve = ve_xe_model::sua_ve($ma_ve);
        $arr_xe = ve_xe_model::ds_xe();
        return view('admin/ve_xe/sua_ve', compact('arr_xe','arr_ve'));
    }
    public function sua_ve_xl(Request $sua)
    {
        $ve_xe = new ve_xe_model();
        $ve_xe->ma_ve  = $sua->ma_ve;
        $ve_xe->ma_xe  = $sua->ma_xe;
        $ve_xe->sua_ve_xl();
        return redirect()->route('admin.ds_ve');
    }
    
    
    public function xoa_xe($ma_xe)
    {
        $arr_xe = ve_xe_model::xoa_xe($ma_xe);
        return redirect()->route('admin.ds_xe');
    }

}
