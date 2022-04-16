<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class khach_hang_model extends Model    
{
    //
    public $ma_khach_hang;
    public $ten_khach_hang;
    public $so_dien_thoai;
    public $email;

    static function ds_khach_hang()
    {
        $result = DB::select("select * from khach_hang");
        return $result;
    }
    public function them_khach_hang_xl()
    {
        DB::insert("insert into khach_hang(ten_khach_hang,so_dien_thoai,email) values (?,?,?)", [
            $this->ten_khach_hang,
            $this->so_dien_thoai,
            $this->email
        ]);
    }
    static function get_kh_by_ID($ma_khach_hang)
    {
        $sql = "select * from khach_hang where ma_khach_hang ='$ma_khach_hang'";
        $result = DB::select($sql);
        return $result;
    }
    public function sua_thong_tin_khach_hang_xl()
    {
        DB::update("update khach_hang set ten_khach_hang = ?, so_dien_thoai = ?, email = ? where ma_khach_hang= ?", [
            $this->ten_khach_hang,
            $this->so_dien_thoai,
            $this->email,
            $this->ma_khach_hang
        ]);
    }
    public static function delete_kh($ma_khach_hang)
    {
        $sql = "delete from khach_hang where ma_khach_hang = '$ma_khach_hang'";
        DB::delete($sql);
    }
    public function lay_ma_theo_email_va_sdt()
    {
        $ma_khach_hang = DB::select('select ma_khach_hang from khach_hang where so_dien_thoai = ? and email = ?', [
            $this->so_dien_thoai,
            $this->email
        ]);
        
        return $ma_khach_hang;
    }

    static function dat_ve($ma_xe)
    {
        $result = DB::select("select * from xe_khach
                                inner join hang_xe on xe_khach.ma_hang  = hang_xe.ma_hang 
                                inner join loai_xe on xe_khach.ma_loai  = loai_xe.ma_loai 
                                inner join tuyen_duong on xe_khach.ma_tuyen  = tuyen_duong.ma_tuyen 
                                inner join lich_trinh on xe_khach.ma_lich_trinh  = lich_trinh.ma_lich_trinh
                                where ma_xe = $ma_xe");
        return $result;
    }
}
