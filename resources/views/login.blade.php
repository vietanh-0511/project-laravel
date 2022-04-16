@extends('admin/layouts.app', [
'namePage' => 'Login page',
'class' => 'login-page sidebar-mini ',
'activePage' => 'login',
'backgroundImage' => asset('assets/img/bg14.jpg')
])

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-12 ml-auto mr-auto">
            <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">

                            <div class="col-lg-5 col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 ml-auto mr-auto">
            <form action="{{ route('login_process') }}" method="post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card card-login card-white">
                    <div class="card-header">
                        <div>
                            <img src="{{ asset('assets/img/now_logo.png') }}" alt="">
                        </div>
                        <h1 class="card-title">{{ __('Log in') }}</h1>
                    </div>
                    <div class="card-body">

                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="user" class="form-control" placeholder="{{ __('Username') }}">

                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" placeholder="{{ __('Password') }}" name="pass" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                        </div>
                        <div style="color: red;">
                            @if (Session::has('error'))
                            * {{Session::get('error')}}
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" href="" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Get Started') }}</button>
                        <div class="pull-left">
                            <h6>
                                <a href="#" class="link footer-link">{{ __('Create Account') }}</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="#" class="link footer-link">{{ __('Forgot password?') }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush