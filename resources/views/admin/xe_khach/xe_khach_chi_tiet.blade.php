@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'xe_khach',
'activeNav' => '',])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Chi Tiết Xe</h4>
            </div>
            
            @foreach ($arr_xe as $each)
            <div class="card-body">
                <div class="col-md-4" style="float: left;">
                    <form action="{{ route('admin.update_anh', [$each->ma_xe]) }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="ma_xe" value="{{$each->ma_xe}}" readonly>
                        <img src="{{ asset('assets/img') }}/{{$each->anh}}" class="img-responsive" alt="Image">
                        <input type="file" class="file-input" name="anh" id="anh" accept="image/*">
                        <button class="btn btn-fill btn-primary">
                            Thay đổi ảnh
                        </button>
                    </form>
                </div>

                <div class="col-md-8" style="float: left;">
                    <table class="table tablesorter " id="">
                        <form method="POST" action="{{route('admin.chi_tiet_xe_xl')}}" autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <tr>
                                <td style="font-weight:550;">
                                    Mã
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="ma_xe" id="ma_xe" value="{{$each->ma_xe}}" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Tên Xe
                                </td>
                                <td>
                                    <input class="form-control" type="text" name="ten_xe" id="" value="{{$each->ten_xe}}">
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Hãng Xe
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <select name="hang_xe" id="hang_xe" class="form-control" value="{{$each->ma_hang}}" required>

                                        <option class="table tablesorter " value="0">Chọn Hãng</option>
                                        @foreach ($arr_hang as $each_hang_xe)
                                        <option class="table tablesorter" value="{{$each_hang_xe->ma_hang}}" @if($each_hang_xe->ma_hang == $each->ma_hang)
                                            selected
                                            @endif
                                            >{{$each_hang_xe->ten_hang}}</option>
                                        @endforeach
                                    </select>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    loại Xe
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <select name="loai_xe" id="loai_xe" class="form-control" value="{{$each->ma_loai}}" required>
                                        <option class="table tablesorter " value=" 0">Chọn Loại Xe</option>
                                        @foreach ($arr_loai as $each_loai_xe)
                                        <option class="table tablesorter" value="{{$each_loai_xe->ma_loai}}" @if($each_loai_xe->ma_loai == $each->ma_loai)
                                            selected
                                            @endif
                                            >{{$each_loai_xe->loai_xe}}</option>
                                        @endforeach
                                    </select>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight:550;">
                                    Tuyến Xe Chạy
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <select name="tuyen_duong" id="tuyen_duong" class="form-control" value="{{$each->ma_tuyen}}" required>
                                        <option class="table tablesorter " value=" 0">Chọn Tuyến Đường</option>
                                        @foreach ($arr_tuyen as $each_tuyen_duong)
                                        <option class="table tablesorter" value="{{$each_tuyen_duong->ma_tuyen}}" @if($each_tuyen_duong->ma_tuyen == $each->ma_tuyen)
                                            selected
                                            @endif
                                            >{{$each_tuyen_duong->tuyen_duong}}</option>
                                        @endforeach
                                    </select>
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Lịch Trình
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <select name="lich_trinh" id="lich_trinh" class="form-control" value="{{$each->ma_lich_trinh}}" required>
                                        <option class="table tablesorter " value=" 0">Chọn Lịch Trình</option>
                                        @foreach ($arr_lich as $each_lich_trinh)
                                        <option class="table tablesorter" value="{{$each_lich_trinh->ma_lich_trinh}}" @if($each_lich_trinh->ma_lich_trinh == $each->ma_lich_trinh)
                                            selected
                                            @endif
                                            >{{$each_lich_trinh->gio_xe_di}} - {{$each_lich_trinh->gio_xe_den}}</option>
                                        @endforeach
                                    </select>

                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Giá Vé
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <input class="form-control" type="text" name="gia_ve" id="" value="{{$each->gia_ve}}">
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Biển Số
                                </td>
                                <td>@foreach ($arr_xe as $each)
                                    <input class="form-control" type="text" name="bien_so" id="" value="{{$each->bien_so}}">
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <br>
                                    <button type="submit" class="btn btn-fill btn-primary">
                                        {{ __('Lưu Thay Đổi') }}
                                    </button>
                                </td>
                                <td>
                                    <br>
                                    <div style=" float: right;">
                                        <a href="{{ route('admin.ds_xe')}}">{{ __('&#8617; Quay lại') }}</a>
                                    </div>

                                </td>
                            </tr>

                    </table>
                    </form>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection