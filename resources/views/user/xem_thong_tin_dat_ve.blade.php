@extends('user/user_layout')
@section('user_content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin đặt vé</h4>
                </div>


                <div class=" card-body">

                    <div class='col-md-12'>
                        @foreach ($lay_ma_khach_hang as $each_khach_hang)
                        <table class='table tablesorter'>
                            <tr>
                                <td style='font-weight:550;'>
                                    Tên người đặt
                                </td>
                                <td>
                                    <input type="text" name="ten_khach_hang" value="{{$each_khach_hang->ten_khach_hang}}" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style='font-weight:550;'>
                                    Số điện thoại
                                </td>
                                <td>
                                    <input type="text" name="so_dien_thoai" value="{{$each_khach_hang->so_dien_thoai}}" class="form-control" readonly>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class='col-md-12' style='float: left;'>
                        <h4 class='card-title'>Vé xe</h4>
                        <div class='table-responsive'>

                            <table class='table tablesorter ' id=''>
                                <thead class=' text-primary'>
                                    <tr>
                                        <th>
                                            Mã hóa đơn
                                        </th>
                                        <th>
                                            Mã xe
                                        </th>
                                        <th>
                                            Số vé
                                        </th>
                                        <th>
                                            Tổng tiền
                                        </th>
                                        <th>
                                            Ngày khởi hành
                                        </th>
                                        <th>
                                            Tình Trạng
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tim_ve as $each_ve)
                                    <form action="{{route('user.huy_don_ve',[$each_khach_hang->so_dien_thoai,$each_ve->ma_hoa_don])}}">
                                        @foreach ($lay_ma_khach_hang as $each_khach_hang)
                                        <input type="hidden" name="ten_khach_hang" value="{{$each_khach_hang->ten_khach_hang}}">
                                        @endforeach
                                        <tr>
                                            <td>
                                                <input type="hidden" name="ma_hoa_don" value="{{$each_ve->ma_hoa_don}}">
                                                {{$each_ve->ma_hoa_don}}
                                            </td>
                                            <td>
                                                {{$each_ve->ma_xe}}
                                            </td>
                                            <td>
                                                {{$each_ve->so_ve}}
                                            </td>
                                            <td>
                                                {{$each_ve->tong_tien}}
                                            </td>
                                            <td>
                                                {{$each_ve->ngay_khoi_hanh}}
                                            </td>
                                            <td>
                                                @if($each_ve->tinh_trang == 1)
                                                {{ __('Đang chờ duyệt đơn') }}
                                                @endif
                                                @if($each_ve->tinh_trang == 2)
                                                {{ __('Đã đặt vé thành công') }}
                                                @endif
                                                @if($each_ve->tinh_trang == 4)
                                                {{ __('Đã hủy vé') }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($each_ve->tinh_trang == 1)
                                                <button class='btn btn-fill btn-primary' id="btn_huy_ve">Hủy vé</button>
                                                @endif
                                                @if($each_ve->tinh_trang == 2)
                                                {{ __('') }}
                                                @endif
                                                @if($each_ve->tinh_trang == 4)
                                                {{ __('') }}
                                                @endif

                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach

                                </tbody>
                            </table>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection