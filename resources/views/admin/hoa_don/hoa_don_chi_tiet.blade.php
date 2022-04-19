@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'ds_hoa_don',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Chi tiết hóa đơn</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.cap_nhat_tinh_trang')}}">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Mã hóa đơn
                                    </th>
                                    <th>
                                        Tên xe
                                    </th>
                                    <th>
                                        Số vé
                                    </th>
                                    <th>
                                        Giá vé
                                    </th>
                                    <th>
                                        Tình Trạng
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arr_hdct as $each_hdct)
                                <tr>
                                    <td>
                                        <input type="hidden" name="ma_hoa_don" value="{{$each_hdct->ma_hoa_don}}">
                                        {{$each_hdct->ma_hoa_don}}
                                    </td>
                                    <td>
                                        {{$each_hdct->ten_xe}}
                                    </td>
                                    <td>
                                        {{$each_hdct->so_ve}}
                                    </td>
                                    <td>
                                        {{$each_hdct->gia_ve}}
                                    </td>
                                    <td>
                                        @if($each_hdct->tinh_trang == 1)
                                        <select class="form-control" name="tinh_trang" id="tinh_trang">
                                            <option value="{{$each_hdct->tinh_trang}}">
                                                @if($each_hdct->tinh_trang == 1)
                                                {{ __('Đang chờ duyệt đơn') }}
                                                @endif
                                                @if($each_hdct->tinh_trang == 2)
                                                {{ __('Đã đặt vé thành công') }}
                                                @endif
                                                @if($each_hdct->tinh_trang == 4)
                                                {{ __('Đã hủy vé') }}
                                                @endif</option>
                                            <option value="2">Đặt vé thành công</option>
                                            <option value="4">Hủy đặt vé</option>
                                        </select>
                                        @endif
                                        @if($each_hdct->tinh_trang != 1)
                                        @if($each_hdct->tinh_trang == 1)
                                        {{ __('Đang chờ duyệt đơn') }}
                                        @endif
                                        @if($each_hdct->tinh_trang == 2)
                                        {{ __('Đã đặt vé thành công') }}
                                        @endif
                                        @if($each_hdct->tinh_trang == 4)
                                        {{ __('Đã hủy vé') }}
                                        @endif
                                        @endif

                                    </td>
                                    <td>
                                        @if($each_hdct->tinh_trang == 1)
                                        <button type="submit" class="btn btn-fill btn-primary"> Cập nhật</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div style="padding-left: 10px;">
                        <br>
                        <a href="{{route('admin.ds_hoa_don')}}">&#8617; Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection