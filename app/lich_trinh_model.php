<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class lich_trinh_model extends Model
{
    //
    public $ma_lich_trinh;
    public $gio_xe_di;
    public $gio_xe_den;

   
    static function ds_lich_trinh()
    {
        $result = DB::select("select * from lich_trinh");
        return $result;
    }
    static function kiem_tra_lich_trinh($gio_xe_di, $gio_xe_den)
    {
        $kiem_tra_lich_trinh = DB::select("select * from lich_trinh 
                                where gio_xe_di like '%$gio_xe_di%' 
                                and gio_xe_den like '%$gio_xe_den%'");
        return $kiem_tra_lich_trinh;
    }
    public function them_lich_trinh_xl()
    {
        DB::insert("insert into lich_trinh(gio_xe_di,gio_xe_den) values (?,?)", [
            $this->gio_xe_di,
            $this->gio_xe_den
        ]);
    }
    static function get_lichtrinh_by_ID($ma_lich_trinh)
    {
        $sql = "select * from lich_trinh where ma_lich_trinh ='$ma_lich_trinh'";
        $result = DB::select($sql);
        return $result;
    }
    public function sua_lich_trinh_xl()
    {
        DB::update("update lich_trinh set gio_xe_di = ?, gio_xe_den = ? where ma_lich_trinh= ?", [
            $this->gio_xe_di,
            $this->gio_xe_den,
            $this->ma_lich_trinh
        ]);
    }
    public static function xoa_lich_trinh($ma_lich_trinh)
    {
        $sql = "delete from lich_trinh where ma_lich_trinh = '$ma_lich_trinh'";
        DB::delete($sql);
    }
    
}
