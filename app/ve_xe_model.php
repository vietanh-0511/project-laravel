<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ve_xe_model extends Model
{
    //
    public $ma_ve;
    public $ma_xe;

    static function ds_ve()
    {
        $result = DB::select("select * from ve_xe
                                inner join xe_khach on ve_xe.ma_xe  = xe_khach.ma_xe ");
        return $result;
    }
    public function them_ve_xl()
    {
        DB::insert("insert into ve_xe(ma_xe) values (?)", [
            $this->ma_xe
        ]);
    }
    static function sua_ve($ma_ve)
    {
        $result = DB::select("select * from ve_xe
                                inner join xe_khach on ve_xe.ma_xe = xe_khach.ma_xe
                                where ma_ve = $ma_ve");

        return $result;
    }
    public function sua_ve_xl()
    {
        DB::update("update ve_xe set ma_xe = ? where ma_ve = ?", [
            $this->ma_xe,
            $this->ma_ve
        ]);
    }
    
    
    
    public static function xoa_xe($ma_xe)
    {
        $sql = "delete from xe_khach where ma_xe = '$ma_xe'";
        DB::delete($sql);
    }

}
