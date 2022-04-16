<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hang_xe_model extends Model
{
    //
    static function ds_hang_xe()
    {
        $result = DB::select("select * from hang_xe");
        return $result;
    }
    public function them_hang_xe_xl()
    {
        DB::insert("insert into hang_xe(ten_hang) values (?)", [
            $this->ten_hang,
        ]);
    }
    static function get_hang_xe($ma_hang)
    {
        $sql = "select * from hang_xe where ma_hang ='$ma_hang'";
        $result = DB::select($sql);
        return $result;
    }
    public function sua_hx_xl()
    {     
        DB::update("update hang_xe set ten_hang = ? where ma_hang= ?",[
            $this->ten_hang,
            $this->ma_hang
        ]);
    }
    public function xoa_hang_xe($ma_hang)
    {
        DB::delete("delete from hang_xe where ma_hang= '$ma_hang'");
    }
}
