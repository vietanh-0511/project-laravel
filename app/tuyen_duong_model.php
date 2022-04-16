<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tuyen_duong_model extends Model
{
    //
    public $ma_tuyen;
    public $tuyen_duong;
    public $diem_di;
    public $diem_den;

    static function ds_tuyen_xe_chay()
    {
        $result = DB::select("select * from tuyen_duong");
        return $result;
    }
    static function kiem_tra_tuyen_duong($diem_di, $diem_den){
        $kiem_tra_tuyen_duong = DB::select("select * from tuyen_duong 
                                where diem_di like '%$diem_di%' 
                                and diem_den like '%$diem_den%'");
        return $kiem_tra_tuyen_duong;
    }
    public function them_tuyen_xl()
    {
        DB::insert("insert into tuyen_duong(tuyen_duong,diem_di,diem_den) values (?,?,?)", [
            $this->tuyen_duong,
            $this->diem_di,
            $this->diem_den
        ]);
    }
    static function get_tuyenduong_by_ID($ma_tuyen)
    {
        $sql = "select * from tuyen_duong where ma_tuyen ='$ma_tuyen'";
        $result = DB::select($sql);
        return $result;
    }
    public function sua_tuyen_duong_xl()
    {
        DB::update("update tuyen_duong set tuyen_duong = ?, diem_di = ?, diem_den = ? where ma_tuyen= ?", [
            $this->tuyen_duong,
            $this->diem_di,
            $this->diem_den,
            $this->ma_tuyen
        ]);
    }
    public static function xoa_tuyen_duong($ma_tuyen)
    {
        $sql = "delete from tuyen_duong where ma_tuyen = '$ma_tuyen'";
        DB::delete($sql);
    }
}
