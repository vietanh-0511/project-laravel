<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class loai_xe_model extends Model
{
    //
    static function ds_loai_xe()
    {
        $result = DB::select("select * from loai_xe");
        return $result;
    }
    static function kiem_tra_loai_xe($loai_xe, $so_ghe)
    {
        $result = DB::select("select * from loai_xe where loai_xe like ? and so_ghe = ?",[
            $loai_xe,
            $so_ghe
        ]);
        return $result;
    }
    public function them_loai_xe_xl()
    {
        DB::insert("insert into loai_xe(loai_xe,so_ghe) values (?,?)", [
            $this->loai_xe,
            $this->so_ghe
        ]);
    }
    static function get_loai_xe($ma_loai)
    {
        $sql = "select * from loai_xe where ma_loai ='$ma_loai'";
        $result = DB::select($sql);
        return $result;
    }
    public function sua_loai_xl()
    {
        DB::update("update loai_xe set loai_xe = ?, so_ghe = ? where ma_loai= ?", [
            $this->loai_xe,
            $this->so_ghe,
            $this->ma_loai
        ]);
    }
    public function xoa_loai_xe($ma_loai)
    {
        DB::delete("delete from loai_xe where ma_loai= '$ma_loai'");
    }

    static function lay_so_ghe_theo_ma_xe($ma_xe)
    {
        $sql = "select so_ghe from loai_xe 
                        inner join xe_khach on loai_xe.ma_loai = xe_khach.ma_loai
                        where xe_khach.ma_xe ='$ma_xe'";
        $result = DB::select($sql);
        return $result;
    }
}
