<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thong_ke_model;

class thong_ke_controller extends Controller
{
    //public function 
    public function thong_ke()
    {
        $xe_khach = thong_ke_model::count_xe_khach();
        $ve_xe = thong_ke_model::count_ve_xe();
        $count = thong_ke_model::count();
        $array_name_subspecialty = array_pluck($count, 'name_subspecialty');
        $array_count = array_pluck($count, 'Tong');
        $data = [];
        $data['array_name_subspecialty'] = $array_name_subspecialty;
        $data['array_count'] = $array_count;
        return view(
            'Manager.index',
            compact(
                'xe_khach',
                've_xe',
                'data'
            )
        );
    }
    public function ThongKe(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $model = AppointmentModel::get_month_and_year($month, $year);
        $array_name_subspecialty = array_pluck($model, 'name_subspecialty');
        $array_tong = array_pluck($model, 'Tong');
        $data = [];
        $data['array_name_subspecialty'] = $array_name_subspecialty;
        $data['array_tong'] = $array_tong;
        return $data;
    }
}
