<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\xe_khach_model;
use App\hang_xe_model;
use App\loai_xe_model;
use App\tuyen_duong_model;
use App\lich_trinh_model;

class xe_khach_controller extends Controller
{
    //
    public function ds_xe()
    {
        $arr_ad = xe_khach_model::ds_xe();
        return view('admin/xe_khach/xe_khach', compact('arr_ad'));
    }
    public function chi_tiet_xe($ma_xe)
    {
        $arr_xe = xe_khach_model::chi_tiet_xe($ma_xe);
        $arr_hang = hang_xe_model::ds_hang_xe();
        $arr_loai = loai_xe_model::ds_loai_xe();
        $arr_tuyen = tuyen_duong_model::ds_tuyen_xe_chay();
        $arr_lich = lich_trinh_model::ds_lich_trinh();
        return view('admin/xe_khach/xe_khach_chi_tiet', compact('arr_xe', 'arr_hang', 'arr_loai', 'arr_tuyen', 'arr_lich'));
    }
    public function chi_tiet_xe_xl(Request $request)
    {
        $xe_khach = new xe_khach_model();
        $xe_khach->ma_xe  = $request->ma_xe;
        $xe_khach->ten_xe  = $request->ten_xe;
        $xe_khach->ma_hang  = $request->hang_xe;
        $xe_khach->ma_loai  = $request->loai_xe;
        $xe_khach->ma_tuyen  = $request->tuyen_duong;
        $xe_khach->ma_lich_trinh  = $request->lich_trinh;
        $xe_khach->gia_ve  = $request->gia_ve;
        $xe_khach->bien_so  = $request->bien_so;
        $xe_khach->chi_tiet_xe_xl();
        return redirect()->route('admin.chi_tiet_xe', [$xe_khach->ma_xe]);
    }

    public function update_anh(Request $request, $ma_xe)
    {
        $xe_khach = new xe_khach_model();
        //$xe_khach->ma_xe = $request->ma_xe;
        if ($request->hasFile('anh')) {
            $file = $request->file('anh');
            $filename = $file->getClientOriginalName('anh');
            $file->move('assets/img', $filename);
            $xe_khach->anh = $filename;
            // dd($filename);
            
        }
        $xe_khach->update_anh($ma_xe);
        //dd($request->ma_xe);
        return redirect()->route('admin.chi_tiet_xe', [$ma_xe]);
    }

    public function them_xe()
    {
        $arr_hang = hang_xe_model::ds_hang_xe();
        $arr_loai = loai_xe_model::ds_loai_xe();
        $arr_tuyen = tuyen_duong_model::ds_tuyen_xe_chay();
        $arr_lich = lich_trinh_model::ds_lich_trinh();
        return view('admin/xe_khach/them_xe', compact('arr_hang', 'arr_loai', 'arr_tuyen', 'arr_lich'));
    }
    public function them_xe_xl(Request $request)
    {
        
        $ten_xe = $request->ten_xe;
        $bien_so = $request->bien_so;
        $kiem_tra_ten_xe = xe_khach_model::kiem_tra_ten_xe($ten_xe);
        $kiem_tra_bien_so = xe_khach_model::kiem_tra_bien_so($bien_so);
        if (count($kiem_tra_ten_xe) != 0) {
            return redirect()->route('admin.them_xe')->with('error_ten', 'đã tồn tại')->withInput();
        } 
        if (count($kiem_tra_bien_so) != 0) {
            return redirect()->route('admin.them_xe')->with('error_bienso', 'đã tồn tại')->withInput();
        } 
        else {
            $xe_khach = new xe_khach_model();
            $xe_khach->ma_xe  = $request->ma_xe;
            $xe_khach->ten_xe  = $request->ten_xe;
            $xe_khach->ma_hang  = $request->hang_xe;
            $xe_khach->ma_loai  = $request->loai_xe;
            $xe_khach->ma_tuyen  = $request->tuyen_duong;
            $xe_khach->ma_lich_trinh  = $request->lich_trinh;
            $xe_khach->gia_ve  = $request->gia_ve;
            $xe_khach->bien_so  = $request->bien_so;
            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                $filename = $file->getClientOriginalName('anh');
                $file->move('assets/img', $filename);
                $xe_khach->anh = $filename;
            }
            $xe_khach->them_xe_xl();
            return redirect()->route('admin.ds_xe');
        }
    }

    public function xoa_xe($ma_xe)
    {
        $arr_xe = xe_khach_model::xoa_xe($ma_xe);
        return redirect()->route('admin.ds_xe');
    }
}
