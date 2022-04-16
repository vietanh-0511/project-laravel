@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_lich_trinh',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thêm lịch trình mói') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.them_lich_trinh_xl') }}" autocomplete="off">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label>{{ __('Giờ xe khởi hành') }}</label>
                        <input type="time" name="gio_xe_di" class="form-control" placeholder="Nhập giờ khởi hành" >
                    </div>
                    @if($errors->has('gio_xe_di') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('gio_xe_di') }}
                            <button type="button" class="close" da ta-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>{{ __('Giờ xe đến') }}</label>
                        <input type="time" name="gio_xe_den" class="form-control" placeholder="Nhập giờ xe đến" >
                    </div>
                    @if($errors->has('gio_xe_den') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('gio_xe_den') }}
                            <button type="button" class="close" da ta-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

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
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Thêm') }}</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection