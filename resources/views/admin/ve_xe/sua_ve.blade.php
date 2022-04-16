@extends('admin/layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="">Chi Tiết Xe</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <form method="POST" action="{{ route('admin.sua_ve_xl')}}" autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @foreach ($arr_ve as $each)
                            <tr>
                                <td style="font-weight:550;">
                                    Mã
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="ma_ve" id="" value="{{$each->ma_ve}}" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-weight:550;">
                                    Mã Xe
                                </td>
                                <td>@foreach ($arr_ve as $each)
                                    <select name="ma_xe" id="ma_xe" class="form-control" value="{{$each->ma_xe}}" required>
                                        <option class="table tablesorter " value="0">Chọn Xe</option>
                                        @foreach ($arr_xe as $each_xe)
                                        <option class="table tablesorter" value="{{$each_xe->ma_xe}}" @if($each_xe->ma_xe == $each->ma_xe)
                                            selected
                                            @endif
                                            >{{$each_xe->ma_xe}} - {{$each_xe->ten_xe}}</option>
                                        @endforeach
                                    </select>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <button type="submit" class="btn btn-fill btn-primary">
                                        {{ __('Lưu Thay Đổi') }}
                                    </button>
                                </td>
                                <td>
                                    <br>
                                    <a href="{{ route('admin.xoa_ve',[$each->ma_ve])}}" style="float: right;">
                                        {{ __('Xóa Xe') }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection