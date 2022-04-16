<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class thong_ke_model extends Model
{
    //
    static function count_xe_khach()
    {
        $count_xe_khach = count(DB::select('select * from xe_khach'));

        return $count_xe_khach;
    }
}
