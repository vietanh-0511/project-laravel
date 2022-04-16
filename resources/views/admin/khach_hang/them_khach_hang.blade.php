@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_khach_hang',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thêm Khách Hàng Mới') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.them_khach_hang_xl') }}" autocomplete="off">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>{{ __('Tên Khách Hàng') }}</label>
                        <input type="text" name="ten_khach_hang" id="ten_khach_hang" class="form-control" placeholder="Nhập Tên" required>
                        <div id="NameError" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Số Điện Thoại') }}</label>
                        <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" placeholder="Nhập Số Điện Thoại" required>
                        <div id="PhoneError" style="color: red; "></div>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Email" required>
                        <div id="EmailError" style="color: red;"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" onclick="return check()" class=" btn btn-fill btn-primary">{{ __('Thêm') }}</button>
                </div>
            </form>
        </div>

    </div>

</div>

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
            EmailError.innerHTML = "email không đúng định dạng!!";
            email.focus();
            return false;
        } else
            divEmailError.innerHTML = "";


    }
</script>
@endsection