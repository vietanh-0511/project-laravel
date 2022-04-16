@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'dat_ve',
'activeNav' => '',])
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin xe</h4>
                </div>
                <form method="POST" action="{{ route('admin.xu_ly_dat_ve')}}" autocomplete="off">
                    <!-- 1. thông tin xe -->
                    <div class="card-body">
                        @foreach($arr_dv as $each)
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

                                            <input type="hidden" name="ma_xe" id="ma_xe" value="{{$each->ma_xe}}">

                                            </tr>
                                            <tr>
                                                <td style="font-weight:550;">
                                                    Hãng xe
                                                </td>
                                                <td>
                                                    {{$each->ten_hang}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:550;">
                                                    Tên xe
                                                </td>
                                                <td>
                                                    {{$each->ten_xe}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:550;">
                                                    loại xe
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
                                                    Tuyến xe chạy
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
                                                    Biển số
                                                </td>
                                                <td>
                                                    {{$each->bien_so}}
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- / -->

                    <!-- 2.đặt vé xe -->
                    <div class="col-md-12" style="float: left;">
                        <h4 class="card-title">Đặt vé xe</h4>
                        <div class="table-responsive">
                            <table class="table tablesorter " id="">

                                {{csrf_field()}}
                                <tr>
                                    <td style="font-weight:550;">
                                        Họ tên
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="ten_khach_hang" id="ten_khach_hang" required>
                                        <div id="NameError" style="color: red;"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-weight:550;">
                                        Số điện thoại
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="so_dien_thoai" id="so_dien_thoai" required>
                                        <div id="PhoneError" style="color: red; "></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-weight:550;">
                                        Email
                                    </td>
                                    <td>
                                        <input class="form-control" type="email" name="email" id="email" required>
                                        <div id="EmailError" style="color: red;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:550;">
                                        Ngày khởi hành
                                    </td>
                                    <td>
                                        <input class="form-control" type="date" min="{{date('Y-m-d')}}" name="ngay_kh" id="ngay_kh" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:550;">
                                        Số ghế
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" value="{{$each->so_ghe}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:550;">
                                        Số ghế trống
                                    </td>
                                    <td>
                                        <textarea name="so_ghe_trong" id="so_ghe_trong" style="height: 30px; border: none; padding-left: 15px;" readonly></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight:550;">
                                        Số vé
                                    </td>
                                    <td>
                                        <input type="number" name="so_ve" id="so_ve" min="1" max="{{$each->so_ghe}}" class="form-control">
                                        <div id="SoveError" style="color: red;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <br>
                                        <button type="submit" onclick="return check()" class="btn btn-fill btn-primary" style="background-color: #fa7037;">
                                            {{ __('Đặt vé') }}
                                        </button>
                                        <div style=" float: right;">
                                            <a href="{{ route('admin.dat_ve_cho_khach')}}">{{ __('&#8617; Quay lại') }}</a>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                        @endforeach
                    </div>
                    <!-- // -->

                </form>
            </div>

        </div>
    </div>
</div>
@endsection
@push('js')

<script>
    $(document).ready(function() {
        $("#ngay_kh,#ma_xe").change(function() {
            $.ajax({
                url: '{{ route('ajax.so_ghe_trong')}}',
                type: 'GET',
                data: {
                    ngay_kh: $("#ngay_kh").val(),
                    ma_xe: $("#ma_xe").val(),
                },
                success: function(data) {
                    $('#so_ghe_trong').html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    function check() {

        const ten_khach_hang = document.getElementById("ten_khach_hang");
        const NameError = document.getElementById("NameError");
        if (ten_khach_hang.value == "") {
            NameError.innerHTML = "* Phải nhập tên";
            ten_khach_hang.focus();
            return false;
        } else
            NameError.innerHTML = "";

        const so_dien_thoai = document.getElementById("so_dien_thoai");
        const PhoneError = document.getElementById("PhoneError");
        const tc_so_dien_thoai = /^0[1-9][0-9]{8,8}$/;
        if (so_dien_thoai.value == 0) {
            PhoneError.innerHTML = "* Phải nhập số điện thoại";
            so_dien_thoai.focus();
            return false;
        }

        if (!tc_so_dien_thoai.test(so_dien_thoai.value)) {
            PhoneError.innerHTML = "* Số điện thoại không đúng định dạng";
            so_dien_thoai.focus();
            return false;
        } else
            PhoneError.innerHTML = "";

        const email = document.getElementById("email");
        const EmailError = document.getElementById("EmailError");
        var tcEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
        if (!tcEmail.test(email.value) || email.value.length == 0) {
            EmailError.innerHTML = "Email không đúng định dạng!!";
            email.focus();
            return false;
        } else
            EmailError.innerHTML = "";


        var so_ghe_trong = document.getElementById("so_ghe_trong");
        var so_ve = document.getElementById("so_ve");
        var lech = so_ve.value - so_ghe_trong.value;
        if (lech > 0) {
            SoveError.innerHTML = "Số vé phải nhỏ hơn số ghế trống!!";
            return false;
        } else
            SoveError.innerHTML = "";

    }
</script>

@endpush