<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hoa_don_chi_tiet_model extends Model
{
    //
    public $ma_hoa_don;
    public $ghe;
    public $gia_ve;

    static function them($ma_hoa_don, $ten_xe, $so_ve, $gia_ve)
    {
        DB::insert("insert into hoa_don_chi_tiet
        values('$ma_hoa_don','$ten_xe', '$so_ve','$gia_ve')");
    }
}
