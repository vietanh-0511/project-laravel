@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_xe_khach',
'activeNav' => '',])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="">Thêm Xe Mới</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <form method="POST" enctype="multipart/form-data" action="{{route('admin.them_xe_xl')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <tr>
                                <td style="font-weight:550;">
                                    Tên Xe
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="ten_xe" id="ten_xe" value="{{ old('ten_xe') }}" required>
                                    <div id="TenError" style="color: red;"></div>
                                </td>
                                @if(session('error_ten'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle"></i> Xe này đã tồn tại
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Hãng Xe
                                </td>
                                <td>
                                    <select name="hang_xe" id="hang_xe1" class="form-control" required>
                                        <option class="table tablesorter" value="0">Chọn Hãng Xe</option>
                                        @foreach ($arr_hang as $each)
                                        <option class="table tablesorter" value="{{$each->ma_hang}}">{{$each->ten_hang}}</option>
                                        @endforeach
                                    </select>
                                    <div id="HangError" style="color: red;"></div>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    loại Xe
                                </td>
                                <td>
                                    <select name="loai_xe" id="loai_xe1" class="form-control" required>
                                        <option class="table tablesorter " value="0">Chọn Loại Xe</option>
                                        @foreach ($arr_loai as $each)
                                        <option class="table tablesorter " value="{{$each->ma_loai}}">{{$each->loai_xe}} - {{$each->so_ghe}} Ghế</option>
                                        @endforeach
                                    </select>
                                    <div id="LoaiError" style="color: red;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight:550;">
                                    Tuyến Xe Chạy
                                </td>
                                <td>
                                    <select name="tuyen_duong" id="tuyen_duong1" class="form-control" required>
                                        <option class="table tablesorter " value="0">Chọn Tuyến Xe Chạy</option>
                                        @foreach ($arr_tuyen as $each)
                                        <option class="table tablesorter " value="{{$each->ma_tuyen}}">{{$each->tuyen_duong}}</option>
                                        @endforeach
                                    </select>
                                    <div id="TuyenError" style="color: red;"></div>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Lịch Trình
                                </td>
                                <td>
                                    <select name="lich_trinh" id="lich_trinh1" class="form-control" required>
                                        <option class="table tablesorter " value="0">Chọn Lịch Trình</option>
                                        @foreach ($arr_lich as $each)
                                        <option class="table tablesorter " value="{{$each->ma_lich_trinh}}">{{$each->gio_xe_di}} - {{$each->gio_xe_den}}</option>
                                        @endforeach
                                    </select>
                                    <div id="LichError" style="color: red;"></div>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Giá Vé
                                </td>
                                <td>
                                    <input class="form-control" type="number" id="gia_ve" name="gia_ve" min="50000" value="{{ old('gia_ve') }}" placeholder="Nhập Giá Vé" required>
                                    <div id="GiaError" style="color: red;"></div>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Biển Số
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="bien_so" name="bien_so" value="{{ old('bien_so') }}" placeholder="Nhập Biển Số Xe" required>
                                    <div id="BienError" style="color: red;"></div>
                                </td>
                                @if(session('error_bienso'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle"></i> Biển số xe đã tồn tại
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </tr>
                            <tr>
                                <td style="font-weight:550;">
                                    Ảnh
                                </td>
                                <td>
                                    <input type="file" name="anh" accept="image/*" value="{{ old('anh') }}" class="file-input" required>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <br>
                                    <button type="submit" onclick="return check()" class="btn btn-fill btn-primary">
                                        {{ __('Thêm') }}
                                    </button>
                                </td>
                            </tr>
                        </form>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@push('js')

<script type="text/javascript">
    function check() {

        const ten_xe = document.getElementById("ten_xe");
        const TenError = document.getElementById("TenError");
        if (ten_xe.value == "") {
            TenError.innerHTML = "* Hãy nhập tên xe";
            return false;
        } else {
            TenError.innerHTML = "";
        }

        const hang_xe1 = document.getElementById("hang_xe1");
        const HangError = document.getElementById("HangError");
        if (hang_xe1.value == 0) {
            HangError.innerHTML = "* Chọn hãng xe";
            return false;
        } else {
            HangError.innerHTML = "";
        }
        const loai_xe1 = document.getElementById("loai_xe1");
        const LoaiError = document.getElementById("LoaiError");
        if (loai_xe1.value == 0) {
            LoaiError.innerHTML = "* Chọn loại xe";
            return false;
        } else {
            LoaiError.innerHTML = "";
        }

        const tuyen_duong1 = document.getElementById("tuyen_duong1");
        const TuyenError = document.getElementById("TuyenError");
        if (tuyen_duong1.value == 0) {
            TuyenError.innerHTML = "* Chọn tuyến đường";
            return false;
        } else {
            TuyenError.innerHTML = "";
        }

        const lich_trinh1 = document.getElementById("lich_trinh1");
        const LichError = document.getElementById("LichError");
        if (lich_trinh1.value == 0) {
            LichError.innerHTML = "* Chọn lịch trình";
            return false;
        } else {
            LichError.innerHTML = "";
        }


        const gia_ve = document.getElementById("gia_ve");
        const GiaError = document.getElementById("GiaError");
        if (gia_ve.value == "") {
            GiaError.innerHTML = "* Nhập giá vé";
            return false;
        } else {
            GiaError.innerHTML = "";
        }

        const bien_so = document.getElementById("bien_so");
        const BienError = document.getElementById("BienError");
        if (bien_so.value == "") {
            BienError.innerHTML = "* Nhập biển số";
            return false;
        } else {
            BienError.innerHTML = "";
        }

    }
</script>

@endpush