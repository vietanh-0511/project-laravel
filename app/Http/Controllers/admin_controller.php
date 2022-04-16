<?php

namespace App\Http\Controllers;

use App\admin_model;
use Illuminate\Http\Request;

class admin_controller extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function login_process(Request $rq)
    {
        $user = $rq->user;
        $pass = $rq->pass;
        $arr_login = admin_model::login_process($user, $pass);

        if (count($arr_login) == 1) {
            $rq->session()->put('ma', $arr_login[0]->ma_admin);
            $ma_admin = $rq->session()->get('ma');
            return redirect()->route('admin.admin', ['ma_admin' => $ma_admin]);
        } else {
            return redirect()->route('login')->with('error', 'tài khoản hoặc mật khẩu sai');
        }
    }
    public function logout(Request $rq)
    {
        $rq->session()->flush();
        return redirect()->route('login');
    }

    public function admin($ma_admin)
    {
        if (session('success_message')) {
            Alert()->success('Đổi mật khẩu thành công', session('success_message'));
        } 
        $arr_ad = admin_model::get_admin($ma_admin);
        return view('admin/admin', compact('arr_ad'));
    }

    public function doi_mk_ad($ma_admin)
    {
        $arr_ad = admin_model::doi_mk_ad($ma_admin);
        return view('admin/doi_mk', compact('arr_ad'));
    }

    public function doi_mk_process(Request $request)
    {
        $ma_admin = $request->ma_admin;
        $mat_khau_moi = $request->mat_khau_moi;
        $doi_mk_process = admin_model::doi_mk_process($ma_admin, $mat_khau_moi);
        $arr_ad = admin_model::get_admin($ma_admin);
        return redirect()->route('admin.admin',[session()->get('ma')])->withSuccessMessage('Đổi mật khẩu thành công');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $model = admin_model::search($search);
        return view('admin/search', compact('model', 'search'));
    }
}
