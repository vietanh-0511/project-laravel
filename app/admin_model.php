<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class admin_model extends Model
{
    //
    public $ma_admin;
    public $ten_dang_nhap;
    public $mat_khau;
    static function login_process($user, $pass)
    {
        $arr_login = DB::select("select * from admin where ten_dang_nhap=? and mat_khau=?", [
            $user,
            $pass
        ]);
        return $arr_login;
    }
    
    static function get_admin($ma_admin)
    {
        $result = DB::select("select * from admin where ma_admin = '$ma_admin'");
        return $result;
    }

    static function doi_mk_ad($ma_admin)
    {
        $result = DB::select("select * from admin where ma_admin ='$ma_admin'");
        return $result;
    }
    static function doi_mk_process($ma_admin, $mat_khau_moi)
    {
        $result = DB::update("update admin set mat_khau = '$mat_khau_moi' where ma_admin ='$ma_admin'");
        return $result;
    }

    static function search($search)
    {
        $model = DB::select("select * from xe_khach 
        inner join tuyen_duong on xe_khach.ma_tuyen=tuyen_duong.ma_tuyen 
        inner join loai_xe on xe_khach.ma_loai=loai_xe.ma_loai 
        inner join hang_xe on xe_khach.ma_hang=hang_xe.ma_hang       
         where ten_xe like '%$search%' or ten_hang='$search'");
        return $model;
    }
    
}
