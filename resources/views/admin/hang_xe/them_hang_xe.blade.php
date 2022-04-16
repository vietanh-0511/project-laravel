@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_hang_xe',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thêm Hãng Xe') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.them_hang_xe_xl') }}" autocomplete="off">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ __('Tên Hãng') }}</label>
                        <input type="text" name="ten_hang" class="form-control" placeholder="Tên Hãng Xe" value="{{ old('ten_hang') }}" >
                    </div>
                </div>
                @include('admin/alerts.hang_xe_validation')
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Thêm') }}</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection