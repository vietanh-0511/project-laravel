@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'sua_loai_xe',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Sửa Loại Xe') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.sua_loai_xl') }}" autocomplete="off">
                @foreach ($arr_loai_xe as $each)
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>{{ __('Mã:') }}</label>
                        <input type="number" name="ma_loai" class="form-control" value="{{$each->ma_loai}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Loại Xe') }}</label>
                        <input type="text" name="loai_xe" class="form-control" value="{{$each->loai_xe}}" required>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Số Ghế') }}</label>
                        <input type="number" name="so_ghe" min= "0" max="50" class="form-control" value="{{$each->so_ghe}}" required>
                    </div>
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
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Lưu Thay Đổi') }}</button>
                    <div style=" float: right;">
                        <a href="{{ route('admin.ds_loai_xe')}}">{{ __('&#8617; Quay lại') }}</a>
                    </div>
                </div>

            </form>
            @endforeach
        </div>

    </div>

</div>
@endsection