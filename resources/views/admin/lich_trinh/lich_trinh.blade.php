@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'lich_trinh',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Lịch trình xe</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter" id="table_lich_trinh">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Giờ xe khởi hành
                                </th>
                                <th>
                                    Giờ xe đến
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->ma_lich_trinh}}
                                </td>
                                <td>
                                    {{$each->gio_xe_di}}
                                </td>
                                <td>
                                    {{$each->gio_xe_den}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sua_lich_trinh',[$each->ma_lich_trinh])}}"> Sửa</a>
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
        $('#table_lich_trinh').dataTable();
    });
</script>
@endpush