@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_loai_xe',
'activeNav' => '',]))

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Thêm Loại Xe') }}</h5>
            </div>
            <form method="post" action="{{ route('admin.them_loai_xe_xl') }}" autocomplete="off">
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ __('Loại Xe') }}</label>
                        <input type="text" name="loai_xe" id="loai_xe" class="form-control" placeholder="Loại Xe" value="{{ old('loai_xe') }}" >
                    </div>

                    @if($errors->has('loai_xe') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('loai_xe') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>{{ __('Số Ghế') }}</label>
                        <input type="number" name="so_ghe" id="so_ghe" min="0" max="50" class="form-control" placeholder="Số Ghế" value="{{ old('loai_xe') }}" >
                    </div>

                    @if($errors->has('so_ghe') )
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ $errors->first('so_ghe') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif


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
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Thêm') }}</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection