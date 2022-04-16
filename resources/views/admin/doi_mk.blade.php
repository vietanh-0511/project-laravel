@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'doi_mat_khau',
'activeNav' => '',]))
@section('content')
<div class="row">
    @foreach ($arr_ad as $each)
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Đổi mật khẩu') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.doi_mk_process')}}" autocomplete="off">

                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="ma_admin" id="ma_admin" value="{{$each->ma_admin}}">
                    <input type="hidden" name="mat_khau" id="mat_khau" value="{{$each->mat_khau}}">
                    <div class="form-group">
                        <label>{{ __('Nhập mật khẩu cũ') }}</label>
                        <input type="password" name="mat_khau_cu" id="mat_khau_cu" class="form-control" placeholder="{{ __('mật khẩu cũ') }}" required>
                        <span id="errMKC" style="color:#F00; font-size:small"></span>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Nhập mật khẩu mới') }}</label>
                        <input type="password" name="mat_khau_moi" id="mat_khau_moi" class="form-control" placeholder="{{ __('mật khẩu mới') }}" required>
                        <span id="errMKM" style="color:#F00; font-size:small"></span>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Nhập Lại mật khẩu mới') }}</label>
                        <input type="password" name="kt_mat_khau_moi" id="kt_mat_khau_moi" class="form-control" placeholder="{{ __('nhập lại mật khẩu mới') }}" required>
                        <span id="errMKM1" style="color:#F00; font-size:small"></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" onclick="return check_mat_khau()" class="btn btn-fill btn-primary">{{ __('Đổi mật khẩu') }}</button>
                    <div style=" float: right;">
                        <a href="{{ route('admin.admin',[$each->ma_admin])}}">{{ __('&#8617; Quay lại') }}</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="avatar" src="{{ asset('assets/img/admin.png') }}" alt="">
                            <h5 class="title">{{$each->ten_dang_nhap}}</h5>
                        </a>
                        <p class="description">
                            {{ __('CEO/CO-FOUNDER') }}
                        </p>
                    </div>
                </p>
                <div class="card-description">
                    <center>{{ __('Admin xinh gái dễ thương nhé!!') }}</center>
                </div>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <button class="btn btn-icon btn-round btn-facebook">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-twitter">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-icon btn-round btn-google">
                        <i class="fab fa-google-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@push('js')
<script>
    function check_mat_khau() {
        var mat_khau = document.getElementById("mat_khau");
        var mat_khau_cu = document.getElementById("mat_khau_cu");
        var mat_khau_moi = document.getElementById("mat_khau_moi");
        var kt_mat_khau_moi = document.getElementById("kt_mat_khau_moi");

        if (document.getElementById("mat_khau_cu").value != document.getElementById("mat_khau").value) {
            document.getElementById("errMKC").innerHTML = "<br/>Mật khẩu cũ không chính xác";
            mat_khau_cu.focus();
            return false;
        } else {
            document.getElementById("errMKC").innerHTML = "";
        }

        if (document.getElementById("mat_khau_moi").length == "0") {
            document.getElementById("errMKM").innerHTML = "<br/>Mật khẩu không được để trống ";
            mat_khau_moi.focus();
            return false;
        } else if (document.getElementById("mat_khau_moi").length > "20") {
            document.getElementById("errMKM").innerHTML = "<br/>Mật khẩu không được nhiều hơn 20 kí tự ";
            mat_khau_moi.focus();
            return false;
        } else {
            document.getElementById("errMKM").innerHTML = "";
        }

        if (document.getElementById("kt_mat_khau_moi").value != document.getElementById("mat_khau_moi").value) {
            document.getElementById("errMKM1").innerHTML = "<br/>Mật khẩu mới phải trùng nhau";
            kt_mat_khau_moi.focus();
            return false;
        } else {
            document.getElementById("errMKM1").innerHTML = "";
        }
    }
</script>
@endpush