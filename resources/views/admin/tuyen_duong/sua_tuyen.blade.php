@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'tuyen_xe',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Sửa') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.sua_tuyen_duong_xl') }}" autocomplete="off">
                @foreach ($arr_tuyenduong as $each)
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>{{ __('Mã:') }}</label>
                        <input type="hidden" name="ma_tuyen" class="form-control" value="{{$each->ma_tuyen}}" readonly>

                    </div>

                    <div class="form-group">
                        <label>{{ __('Tuyến Đường') }}</label>
                        <input type="text" name="tuyen_duong" class="form-control" placeholder="Tuyến Đường" value="{{$each->tuyen_duong}}" required>

                    </div>

                    <div class=" form-group">
                        <label>{{ __('Điểm Đi') }}</label>
                        <input type="text" name="diem_di" class="form-control" placeholder="Điểm Đi" value="{{$each->diem_di}}" required>

                    </div>

                    <div class=" form-group">
                        <label>{{ __('Điểm Đến') }}</label>
                        <input type="text" name="diem_den" class="form-control" placeholder="Điểm Đến" value="{{$each->diem_den}}" required>
                    </div>
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
                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Lưu Thay Đổi') }}</button>
                    <div style=" float: right;">
                        <a href="{{ route('admin.ds_tuyen_xe_chay')}}">{{ __('&#8617; Quay lại') }}</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>

    </div>

</div>
@endsection