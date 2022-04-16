@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'ds_hoa_don',
'activeNav' => '',])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="">Hóa Đơn</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="table_hoa_don">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Mã Khách Hàng
                                </th>
                                <th>
                                    Tên Khách Hàng
                                </th>
                                <th>
                                    Tổng Tiền
                                </th>
                                <th>
                                    Ngày Đặt
                                </th>
                                <th>
                                    Ngày Khởi Hành
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    <input type="hidden" id="ma_hoa_don" name="ma_hoa_don" value="{{$each->ma_hoa_don}}">
                                    {{$each->ma_hoa_don}}
                                </td>
                                <td>
                                    {{$each->ma_khach_hang}}
                                </td>
                                <td>
                                    {{$each->ten_khach_hang}}
                                </td>
                                <td>
                                    {{$each->tong_tien}}
                                </td>
                                <td>
                                    {{$each->ngay_dat}}
                                </td>
                                <td>
                                    {{$each->ngay_khoi_hanh }}
                                </td>


                                <td colspan="2">
                                    <a href="{{route('admin.chi_tiet_hoa_don',[$each->ma_hoa_don])}}">Chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_hoa_don').dataTable();
    });
</script>
@endpush