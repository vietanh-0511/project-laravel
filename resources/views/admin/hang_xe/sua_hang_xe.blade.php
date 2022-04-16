@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'sua_hang_xe',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Sửa hãng xe') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.sua_hx_xl') }}" autocomplete="off">
                @foreach ($arr_hang as $each)
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>{{ __('Mã:') }}</label>
                        <input type="number" name="ma" class="form-control" value="{{$each->ma_hang}}" readonly>
                    </div>

                    <div class="form-group">
                        <label>{{ __('Tên hãng') }}</label>
                        <input type="text" name="ten_hang" class="form-control" value="{{$each->ten_hang}}" required>
                        @include('admin/alerts.hang_xe_validation')
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Lưu Thay Đổi') }}</button>
                    <div style=" float: right;">
                        <a href="{{ route('admin.ds_hang_xe')}}">{{ __('&#8617; Quay lại') }}</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>

    </div>

</div>
@endsection