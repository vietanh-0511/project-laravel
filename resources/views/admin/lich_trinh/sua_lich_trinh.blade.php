@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'sua_lich_trinh',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Sửa Lịch Trình') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.sua_lich_trinh_xl') }}" autocomplete="off">
                @foreach ($arr_lichtrinh as $each)
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ __('Mã:') }}</label>
                        <input type="hidden" name="ma" class="form-control" value="{{$each->ma_lich_trinh}}" readonly>

                    </div>

                    <div class="form-group">
                        <label>{{ __('Giờ xe khởi hành') }}</label>
                        <input type="time" name="gio_xe_di" class="form-control" placeholder="Giờ xe khởi hành" value="{{$each->gio_xe_di}}" required>

                    </div>

                    <div class=" form-group">
                        <label>{{ __('Giờ xe đến nơi') }}</label>
                        <input type="time" name="gio_xe_den" class="form-control" placeholder="Giờ xe đến" value="{{$each->gio_xe_den}}" required>

                    </div>
                    @if(session('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Lịch Trình đã tồn tại
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
                        <a href="{{ route('admin.ds_lich_trinh')}}">{{ __('&#8617; Quay lại') }}</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>

    </div>

</div>
@endsection