@extends('user/user_layout')
@section('user_content')
@include('sweetalert::alert')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Danh sách xe</h1>
                </div>
                <div class="card-body">
                    @foreach($arr_xe as $each)
                    <div class="card card-user" style="padding-top: 100px">
                        <div class="card-body">
                            <p class="card-text">
                                <div class="col-md-4" style="float: left">
                                    <div class="block block-one">
                                        <img src="{{ asset('assets/img') }}/{{$each->anh}}">
                                    </div>
                                    <div class="block block-two" style="padding-top: 30px;">
                                        <h5 class="title">{{$each->ten_xe}}</h5>
                                    </div>
                                </div>

                                <div class="col-md-8" style="float: left">
                                    <table class="table tablesorter " id="">

                                        <tr>
                                            <td style="font-weight:550;">
                                                Hãng Xe
                                            </td>
                                            <td>
                                                {{$each->ten_hang}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                loại Xe
                                            </td>
                                            <td>
                                                {{$each->loai_xe}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                Số ghế
                                            </td>
                                            <td>
                                                {{$each->so_ghe}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                Tuyến Xe Chạy
                                            </td>
                                            <td>
                                                {{$each->tuyen_duong}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                Lịch trình
                                            </td>
                                            <td>
                                                {{$each->gio_xe_di}} - {{$each->gio_xe_den}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                Giá vé
                                            </td>
                                            <td>
                                                {{$each->gia_ve}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:550;">
                                                Biển Số
                                            </td>
                                            <td>
                                                {{$each->bien_so}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><a class="btn btn-fill btn-primary" style="background-color: #fa7037;" href="{{ route('user.dat_ve',[$each->ma_xe])}}" role="button">Đặt vé ngay</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </p>
                            <div class="card-description">
                                <center>{{ __('') }}</center>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection