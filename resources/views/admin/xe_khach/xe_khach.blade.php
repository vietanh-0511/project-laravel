@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'xe_khach',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Danh Sách Xe</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="table_xe_khach">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Tên Xe
                                </th>
                                <th>
                                    Hãng Xe
                                </th>
                                <th>
                                    Loại Xe
                                </th>
                    
                                <th>
                                    Tuyến Xe Chạy
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->ma_xe}}
                                </td>
                                <td>
                                    {{$each->ten_xe}}
                                </td>
                                <td>
                                    {{$each->ten_hang}}
                                </td>
                                <td>
                                    {{$each->loai_xe}}
                                </td>
                            
                                <td>
                                    {{$each->tuyen_duong}}
                                </td>

                                <td>
                                    <a href="{{route ('admin.chi_tiet_xe', [$each->ma_xe])}}">Chi Tiết</a>
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
        $('#table_xe_khach').dataTable();
    });
</script>
@endpush