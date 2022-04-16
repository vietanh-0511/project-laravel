@extends('admin/layout', [
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'profile_admin',
'activeNav' => '',])
@section('content')
<div class="row">
    @foreach ($arr_ad as $each)
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thông Tin Admin') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.doi_mk_ad',[$each->ma_admin])}}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('admin/alerts.success')

                    <div class="form-group{{ $errors->has('user') ? ' has-danger' : '' }}">
                        <label>{{ __('Tên Đăng Nhập') }}</label>
                        <input type="text" name="user" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" placeholder="{{ __('tên đăng nhập') }}" value="{{$each->ten_dang_nhap}}">
                        @include('admin/alerts.feedback',['field' => 'user'])
                    </div>

                    <div class="form-group{{ $errors->has('pass') ? ' has-danger' : '' }}">
                        <label>{{ __('Mật Khẩu') }}</label>
                        <input type="password" name="pass" class="form-control{{ $errors->has('pass') ? ' is-invalid' : '' }}" placeholder="{{ __('mật khẩu') }}" value="{{$each->mat_khau}}" readonly>
                        @include('admin/alerts.feedback',['field' => 'pass'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Đổi Mật Khẩu') }}</button>
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
                    <a href="https://www.facebook.com/trang.heo.1703" class="btn btn-icon btn-round btn-facebook" role="button">
                        <i style="padding-top: 12px;" class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/?lang=vi" class="btn btn-icon btn-round btn-twitter">
                        <i style="padding-top: 12px;" class="fab fa-twitter"></i>
                    </a>
                    <a href="https://mail.google.com/mail/u/0/#inbox" class="btn btn-icon btn-round btn-google">
                        <i style="padding-top: 12px;" class="fab fa-google-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection