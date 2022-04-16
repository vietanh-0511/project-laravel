<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hoa_don_model extends Model
{
    //
    public $ma_hoa_don;
    public $ma_khach_hang;
    public $tong_tien;
    public $tinh_trang;
    public $ma_ve;
    public $gia_ve;
    public $ngay_dat;
    public $ngay_khoi_hanh;

    static function ds_hoa_don()
    {
        $result = DB::select("select * from hoa_don
                                inner join khach_hang on hoa_don.ma_khach_hang  = khach_hang.ma_khach_hang ");

        return $result;
    }
    static function chi_tiet_hoa_don($ma_hoa_don)
    {
        $result = DB::select("select * from hoa_don_chi_tiet
                               
                                inner join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma_hoa_don 
                                 inner join xe_khach on hoa_don_chi_tiet.ma_xe  = xe_khach.ma_xe  
                                where hoa_don.ma_hoa_don = $ma_hoa_don");
        
        return $result ;
    }

    static function them($ma_khach_hang,$tong_tien,$tinh_trang,$ngay_dat,$ngay_kh)
    {
        DB::insert("insert into hoa_don (ma_khach_hang,tong_tien,tinh_trang,ngay_dat,ngay_khoi_hanh)
        values('$ma_khach_hang','$tong_tien','$tinh_trang','$ngay_dat','$ngay_kh')");
    }
    
    public static function lay_ma_hoa_don_lon_nhat()
    {
        $sql = "select max(ma_hoa_don) as max_ma_hoa_don from hoa_don";
        $result = DB::select($sql);

        return $result;
    }

    public static function cap_nhat_tinh_trang_hoa_don($ma_hoa_don, $tinh_trang)
    {
        $sql = "update hoa_don set tinh_trang = '$tinh_trang' where ma_hoa_don = '$ma_hoa_don'";
        DB::update($sql);
    }
}
