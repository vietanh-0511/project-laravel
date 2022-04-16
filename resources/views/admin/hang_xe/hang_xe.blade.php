@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'hang_xe',
'activeNav' => '',])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Hãng xe</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="table_hang_xe">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Hãng Xe
                                </th>
                                <th></th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->ma_hang}}
                                </td>
                                <td>
                                    {{$each-> ten_hang}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sua_hang_xe',[$each->ma_hang])}}"> Sửa</a>
                                </td>
                                <!-- <td class="text-center">
                                    <a href="{{ route('admin.xoa_hang_xe',[$each->ma_hang])}}" onclick="return alert('');"> Xóa</a>
                                </td> -->
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
        $('#table_hang_xe').dataTable();
    });
</script>
@endpush