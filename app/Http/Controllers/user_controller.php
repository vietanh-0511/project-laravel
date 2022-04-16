<?php

namespace App\Http\Controllers;

use App\hoa_don_model;
use App\khach_hang_model;
use Illuminate\Http\Request;
use App\user_model;
use App\xe_khach_model;
use App\hoa_don_chi_tiet_model;
use App\loai_xe_model;
use Illuminate\Support\collection;
use RealRashid\SweetAlert\Facades\Alert;


class user_controller extends Controller
{
    //
    public function user_layout()
    {
        return view('user/user_layout');
    }

    public function tim_tuyen()
    {
        $arr_tuyen = user_model::tuyen();
        return view('user/chon_tuyen', compact('arr_tuyen'));
    }

    public function ds_xe()
    {   
        if (session('success_message')) {
            Alert()->success('Đặt vé thành công',session('success_message'));
            return redirect()->route('user.ds_xe');
        } 
        $arr_xe = user_model::ds_xe();
        return view('user/danh_sach_xe', compact('arr_xe'));
    }

    public function dat_ve($ma_xe)
    {
        $arr_dv = user_model::dat_ve($ma_xe);
        return view('user/dat_ve', compact('arr_dv'));
    }
    public function xe_theo_tuyen(Request $rq)
    {
        $ma_tuyen = $rq->ma_tuyen;
        $xe_theo_tuyen = user_model::xe_theo_tuyen($ma_tuyen);
        $string_option = "";
        foreach ($xe_theo_tuyen as $each) {
            $link = route("user.dat_ve", ['$ma_xe' => $each->ma_xe]);
            $anh = asset("assets/img/$each->anh");
            $string_option .= "
                        <div class='card-body'>
                            <p class='card-text'>
                                <div class='col-md-4' style='float: left'>
                                    <div class='block block-one'>
                                        <img src='" . $anh . "'>
                                    </div>
                                    <div class='block block-two' style='padding-top: 30px;'>
                                        <h5 class='title'>{$each->ten_xe}</h5>
                                    </div>
                                </div>

                                <div class='col-md-8' style='float: left'>
                                    <table class='table tablesorter ' id=''>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Mã
                                            </td>
                                            <td>
                                                {$each->ma_xe}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Hãng Xe
                                            </td>
                                            <td>
                                                {$each->ten_hang}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                loại Xe
                                            </td>
                                            <td>
                                                {$each->loai_xe}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Tuyến Xe Chạy
                                            </td>
                                            <td>
                                                {$each->tuyen_duong}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Lịch Trình
                                            </td>
                                            <td>
                                                {$each->gio_xe_di} - {$each->gio_xe_den}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Giá Vé
                                            </td>
                                            <td>
                                                {$each->gia_ve}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='font-weight:550;'>
                                                Biển Số
                                            </td>
                                            <td>
                                                {$each->bien_so}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='2'><a class='btn btn-fill btn-primary' href='" . $link . "' role='button'>Đặt vé ngay</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </p>
                        </div>
                    ";
        }
        echo ($string_option);
    }

    public function so_ghe_trong(Request $rq)
    {
        $ngay_kh = $rq->ngay_kh;
        $ma_xe = $rq->ma_xe;
        $lay_xe_theo_ma = user_model::lay_xe_theo_ma($ma_xe);
        $tong_so_ghe = $lay_xe_theo_ma[0]->so_ghe;
        $so_ghe_da_dat = user_model::so_ghe_da_dat($ma_xe, $ngay_kh);
        $so_ghe_trong = $tong_so_ghe - $so_ghe_da_dat;
        $string_option = "";
        $string_option .= "$so_ghe_trong";
        echo ($string_option);
    }

    public function lay_ma_ghe()
    {
        $string = $_GET["id"];
        echo ($string);
    }

    public function xu_ly_dat_ve(Request $rq)
    {
        $ten_khach_hang = $rq->ten_khach_hang;
        $so_dien_thoai = $rq->so_dien_thoai;
        $email = $rq->email;
        $ngay_kh = $rq->ngay_kh;
        $ma_xe = $rq->ma_xe;
        $so_ve = $rq->so_ve;

        $gia_ve = xe_khach_model::gia_ve($ma_xe);


        $object = new khach_hang_model();
        $object->email = $email;
        $object->so_dien_thoai = $so_dien_thoai;
        $khach_hang = $object->lay_ma_theo_email_va_sdt();

        if (empty($khach_hang)) {
            $object->ten_khach_hang = $ten_khach_hang;
            $object->them_khach_hang_xl();
            $khach_hang = $object->lay_ma_theo_email_va_sdt();
        }
        $ma_khach_hang = $khach_hang[0]->ma_khach_hang;

        $ngay_dat = date('Y-m-d');
        $tong_tien = $gia_ve * $so_ve;
        hoa_don_model::them($ma_khach_hang, $tong_tien, 1, $ngay_dat, $ngay_kh);
        $hoa_don = hoa_don_model::lay_ma_hoa_don_lon_nhat();
        if (empty($hoa_don)) {
            $hoa_don = 1;
        }
        $ma_hoa_don = $hoa_don[0]->max_ma_hoa_don;
        hoa_don_chi_tiet_model::them($ma_hoa_don, $ma_xe, $so_ve, $gia_ve);

        return redirect()->route('user.ds_xe')->withSuccessMessage('Đặt vé thành công');
    }

    public function search(Request $request)
    {
        $search = addslashes($request->search);
        $model = user_model::search($search);
        return view('user/search', compact('model', 'search'));
    }

    public function tim_ve_theo_so_dien_thoai()
    {
        if (session('error_message')) {
            Alert()->error('Không tìm thấy số điện thoại', session('error_message'));
            return redirect()->route('user.tim_ve_theo_so_dien_thoai');
        } 
        return view('user/tim_ve_theo_so_dien_thoai');
    }

    public function tim_ve(Request $request)
    {
        $so_dien_thoai = $request->so_dien_thoai;
        $lay_ma_khach_hang = user_model::lay_ma_khach_hang($so_dien_thoai);
        if (empty($lay_ma_khach_hang)) {
            return redirect()->route('user.tim_ve_theo_so_dien_thoai')->withErrorMessage('Không tìm thấy số điện thoại');
        }
        foreach ($lay_ma_khach_hang as $each_khach_hang) {
            $ma_khach_hang = $each_khach_hang->ma_khach_hang;
            $tim_ve = user_model::tim_ve($ma_khach_hang);
        }
        return view('user/xem_thong_tin_dat_ve', compact('tim_ve', 'lay_ma_khach_hang'));
    }

    public function huy_don_ve($so_dien_thoai,$ma_hoa_don)
    {
        user_model::huy_don_ve($ma_hoa_don);
        $lay_ma_khach_hang = user_model::lay_ma_khach_hang($so_dien_thoai);
        foreach ($lay_ma_khach_hang as $each_khach_hang) {
            $ma_khach_hang = $each_khach_hang->ma_khach_hang;
            $tim_ve = user_model::tim_ve($ma_khach_hang);
        }
        return view('user/xem_thong_tin_dat_ve', compact('tim_ve', 'lay_ma_khach_hang'));
    }
}
