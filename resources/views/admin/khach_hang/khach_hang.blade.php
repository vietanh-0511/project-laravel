@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'khach_hang',
'activeNav' => '',])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="">Danh Sách Khách Hàng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_khach_hang" class="table tablesorter ">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã Khách Hàng
                                </th>
                                <th>
                                    Tên Khách Hàng
                                </th>
                                <th>
                                    Số Điện Thoại
                                </th>
                                <th>
                                    Email
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->ma_khach_hang}}
                                </td>
                                <td>
                                    {{$each->ten_khach_hang}}
                                </td>
                                <td>
                                    {{$each->so_dien_thoai}}
                                </td>
                                <td>
                                    {{$each->email}}
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
        $('#table_khach_hang').dataTable();
    });
</script>
@endpush