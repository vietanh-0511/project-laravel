@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'xe_khach',
'activeNav' => '',]))
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Kết quả tìm kiếm</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">

                <h3 class="card-category"> Tìm thấy {{ count($model) }} kết quả cho từ khóa "<span style="color:#0da8ee;">{{ $search }}</span>"</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Mã Xe
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
                                    Tuyến Xe
                                </th>
                                <th>
                                </th>

                                @foreach($model as $each)
                            <tr>
                                <td>{{$each->ma_xe}}</td>
                                <td>{{$each->ten_xe}}</td>
                                <td>{{$each->ten_hang}}</td>
                                <td>{{$each->loai_xe}}</td>
                                <td>{{$each->tuyen_duong}}</td>
                                <td>
                                    <a href="{{route ('admin.chi_tiet_xe', [$each->ma_xe])}}">Chi Tiết</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection