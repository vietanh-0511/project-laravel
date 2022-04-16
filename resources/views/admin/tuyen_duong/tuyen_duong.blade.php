@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'tuyen_xe',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">Tuyến Xe Chạy</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(session('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Tuyến đường đã tồn tại
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <table class="table tablesorter " id="table_tuyen">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Tuyến xe chạy
                                </th>
                                <th>
                                    Điểm đi
                                </th>
                                <th>
                                    Điểm đến
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($arr_ad as $each)
                            <tr>
                                <td>
                                    {{$each->tuyen_duong}}
                                </td>
                                <td>
                                    {{$each->diem_di}}
                                </td>
                                <td>
                                    {{$each->diem_den}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.sua_tuyen_duong',[$each->ma_tuyen])}}"> Sửa</a>
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
        $('#table_tuyen').dataTable();
    });
</script>
@endpush