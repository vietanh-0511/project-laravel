<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class user_model extends Model
{
    //
    protected $table = "xe_khach";
    public $ma_tuyen;
    public $tuyen_duong;
    public $diem_di;
    public $diem_den;

    public $ma_xe;
    public $ten_xe;
    public $ma_hang;
    public $ma_loai;
    public $ma_lich_trinh;
    public $gia_ve;
    public $bien_so;
    public $anh;

    static function tuyen()
    {
        $result = DB::select("select * from tuyen_duong");
        return $result;
    }

    static function ds_xe()
    {
        $result = DB::select("select * from xe_khach
                                inner join hang_xe on xe_khach.ma_hang  = hang_xe.ma_hang 
                                inner join loai_xe on xe_khach.ma_loai  = loai_xe.ma_loai 
                                inner join tuyen_duong on xe_khach.ma_tuyen  = tuyen_duong.ma_tuyen 
                                inner join lich_trinh on xe_khach.ma_lich_trinh  = lich_trinh.ma_lich_trinh ");

        return $result;
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

    static function xe_theo_tuyen($ma_tuyen)
    {
        $xe_theo_tuyen = DB::select('select * from xe_khach
                                inner join hang_xe on xe_khach.ma_hang  = hang_xe.ma_hang 
                                inner join loai_xe on xe_khach.ma_loai  = loai_xe.ma_loai 
                                inner join tuyen_duong on xe_khach.ma_tuyen  = tuyen_duong.ma_tuyen 
                                inner join lich_trinh on xe_khach.ma_lich_trinh  = lich_trinh.ma_lich_trinh
                                where xe_khach.ma_tuyen = ?', [
            $ma_tuyen
        ]);
        return $xe_theo_tuyen;
    }

    static function lay_xe_theo_ma($ma_xe)
    {
        $lay_xe_theo_ma = DB::select('select so_ghe from loai_xe 
                        inner join xe_khach on loai_xe.ma_loai = xe_khach.ma_loai
                        where xe_khach.ma_xe =?', [
            $ma_xe
        ]);
        return $lay_xe_theo_ma;
    }

    static function so_ghe_da_dat($ma_xe, $ngay_kh)
    {
        $so_ghe_da_dat = DB::select("select SUM(so_ve) as 'so_ghe_da_dat' from hoa_don_chi_tiet
                                inner join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don
                                inner join xe_khach on hoa_don_chi_tiet.ma_xe = xe_khach.ma_xe
                                where hoa_don.ngay_khoi_hanh = ? and hoa_don_chi_tiet.ma_xe = ? and hoa_don.tinh_trang != '4'", [
            $ngay_kh,
            $ma_xe
        ]);
        return $so_ghe_da_dat[0]->so_ghe_da_dat;
    }


    static function get_ma_ve($ma_xe, $ma_ghe)
    {
        $get_ma_ve = DB::select('select ma_ve from ve_xe where ma_xe = ? and ma_ghe = ?', [
            $ma_xe,
            $ma_ghe
        ]);
        return $get_ma_ve;
    }


    static function them_hd($ma_kh, $so_ve, $tong_tien)
    {
        $them_hd = DB::insert('insert into hoa_don value (?,?,?,?,?)', [
            Null,
            $ma_kh,
            $so_ve,
            $tong_tien,
            1,
        ]);
        return  $them_hd;
    }

    static function chon_ma_hd()
    {
        $chon_ma_hd = DB::select('select max(ma_hoa_don) from hoa_don');
        return  $chon_ma_hd;
    }

    static function search($search)
    {
        $model = DB::select("select * from xe_khach 
            inner join tuyen_duong on xe_khach.ma_tuyen=tuyen_duong.ma_tuyen 
            inner join loai_xe on xe_khach.ma_loai=loai_xe.ma_loai 
            inner join hang_xe on xe_khach.ma_hang=hang_xe.ma_hang       
            where ten_xe like '%$search%' or ten_hang='%$search%'");
        return $model;
    }

    static function lay_ma_khach_hang($so_dien_thoai)
    {
        $lay_ma_khach_hang = DB::select("select * from khach_hang where so_dien_thoai = '$so_dien_thoai'");
        return $lay_ma_khach_hang;
    }

    static function tim_ve($ma_khach_hang)
    {
        $tim_ve = DB::select("select * from hoa_don 
            inner join hoa_don_chi_tiet on hoa_don.ma_hoa_don = hoa_don_chi_tiet.ma_hoa_don 
            inner join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma_khach_hang 
            where hoa_don.ma_khach_hang = '$ma_khach_hang'");
        return $tim_ve;
    }

    static function huy_don_ve($ma_hoa_don)
    {
        $huy_don_ve = DB::update("update hoa_don set tinh_trang = '4' where ma_hoa_don = '$ma_hoa_don'");
        return $huy_don_ve;
    }
}
