<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class xe_khach_model extends Model
{
    //
    public $ma_xe;
    public $ten_xe;
    public $ma_hang;
    public $ma_loai;
    public $ma_tuyen;
    public $ma_lich_trinh;
    public $gia_ve;
    public $bien_so;

    static function ds_xe()
    {
        $result = DB::select("select * from xe_khach
                                inner join hang_xe on xe_khach.ma_hang  = hang_xe.ma_hang 
                                inner join loai_xe on xe_khach.ma_loai  = loai_xe.ma_loai 
                                inner join tuyen_duong on xe_khach.ma_tuyen  = tuyen_duong.ma_tuyen 
                                inner join lich_trinh on xe_khach.ma_lich_trinh  = lich_trinh.ma_lich_trinh ");

        return $result;
    }
    static function chi_tiet_xe($ma_xe)
    {
        $result = DB::select("select * from xe_khach
                                inner join hang_xe on xe_khach.ma_hang  = hang_xe.ma_hang 
                                inner join loai_xe on xe_khach.ma_loai  = loai_xe.ma_loai 
                                inner join tuyen_duong on xe_khach.ma_tuyen  = tuyen_duong.ma_tuyen 
                                inner join lich_trinh on xe_khach.ma_lich_trinh  = lich_trinh.ma_lich_trinh 
                                where ma_xe = $ma_xe");

        return $result;
    }
    static function gia_ve($ma_xe)
    {
        $result = DB::select("select gia_ve from xe_khach where ma_xe = $ma_xe");

        return $result[0]->gia_ve;
    }
    public function chi_tiet_xe_xl()
    {
        DB::update("update xe_khach set ten_xe = ?, ma_hang = ?, ma_loai = ?, ma_tuyen = ?, ma_lich_trinh = ?, gia_ve = ?, bien_so = ? where ma_xe= ?", [
            $this->ten_xe, 
            $this->ma_hang,
            $this->ma_loai,
            $this->ma_tuyen,
            $this->ma_lich_trinh,
            $this->gia_ve,
            $this->bien_so,
            $this->ma_xe
        ]);
    }
    public function update_anh($ma_xe)
    {
        $update = DB::update("update xe_khach set anh = ? where ma_xe= ?", [
            $this->anh,
            $ma_xe,
        ]);
    }
    static function kiem_tra_ten_xe($ten_xe)
    {
        $result = DB::select("select ten_xe from xe_khach where ten_xe like '$ten_xe'");
        return $result;
    }

    static function kiem_tra_bien_so($bien_so)
    {
        $result = DB::select("select bien_so from xe_khach where bien_so like '$bien_so'");
        return $result;
    }

    public function them_xe_xl()
    {
        DB::insert("insert into xe_khach(ten_xe,ma_hang,ma_loai,ma_tuyen,ma_lich_trinh,gia_ve,bien_so,anh) values (?,?,?,?,?,?,?,?)", [
            $this->ten_xe, 
            $this->ma_hang, 
            $this->ma_loai,
            $this->ma_tuyen,
            $this->ma_lich_trinh,
            $this->gia_ve,
            $this->bien_so,
            $this->anh
        ]);
    }
    
    
    public static function xoa_xe($ma_xe)
    {
        $sql = "delete from xe_khach where ma_xe = '$ma_xe'";
        DB::delete($sql);
    }

    public static function thay_anh_xe_khach($anh, $ma_xe)
    {
        $sql = "update xe_khach set anh = $anh where ma_xe = $ma_xe";
        DB::update($sql);
    }
}
