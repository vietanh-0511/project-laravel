@extends('user/user_layout')
@section('user_content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nhập số điện thoại để xem lịch sử đặt vé</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{route('user.tim_ve')}}">
                            {{csrf_field()}}
                            <div class="col-md-6" style="float: left;">
                                <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control">
                                <div id="PhoneError" style="color: red; "></div>
                                <button id="tim_ve" onclick="return check()" class="btn btn-fill btn-primary">Tìm</button>
                            </div>
                        </form>

                    </div>

                    <div class="" id="show_ve" style="padding-top: 100px">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script>
        function check() {
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
        }
    </script>
    @endpush