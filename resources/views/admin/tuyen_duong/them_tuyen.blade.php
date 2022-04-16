@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_tuyen_xe',
'activeNav' => '',]))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thêm Tuyến Đường Mới') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.them_tuyen_xl') }}" autocomplete="off">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                        <label>{{ __('Tuyến Đường') }}</label>
                        <input type="text" name="tuyen_duong" class="form-control" placeholder="Tuyến Đường">
                    </div>
                    @if($errors->has('tuyen_duong') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('tuyen_duong') }}
                            <button type="button" class="close" da ta-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>{{ __('Điểm Đi') }}</label>
                        <input type="text" name="diem_di" class="form-control" placeholder="Điểm Đi">
                    </div>
                    @if($errors->has('diem_di') )

                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('diem_di') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>{{ __('Điểm Đến') }}</label>
                        <input type="text" name="diem_den" class="form-control" placeholder="Điểm Đến">
                    </div>
                    @if($errors->has('diem_den') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('diem_den') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Thêm Tuyến Xe Chạy') }}</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection