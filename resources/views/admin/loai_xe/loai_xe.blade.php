@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'loai_xe',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Loại Xe</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="table_loai_xe">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Loại Xe
                                </th>
                                <th>
                                    Số Ghế
                                </th>
                                <th></th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->ma_loai}}
                                </td>
                                <td>
                                    {{$each->loai_xe}}
                                </td>
                                <td>
                                    {{$each->so_ghe}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sua_loai_xe',[$each->ma_loai])}}"> Sửa</a>
                                </td>
                                <!-- <td class="text-center">
                                    <a href="{{ route('admin.xoa_loai_xe',[$each->ma_loai])}}" onclick="return alert('');"> Xóa</a>
                                </td> -->
                            </tr>
                            @endforeach
                        </tbody>
                        @if(session('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle"></i> Loại xe đã tồn tại
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
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
        $('#table_loai_xe').dataTable();
    });
</script>
@endpush