@extends('admin/layout',[
'class' => 'sidebar-mini ',
'namePage' => 'User Profile',
'activePage' => 'them_ve',
'activeNav' => '',]))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="">Thêm Vé</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <form method="POST" action="{{route('admin.them_ve_xl')}}" autocomplete="off">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <tr>
                                <td style="font-weight:550;">
                                    Mã Xe
                                </td>
                                <td>
                                    <select name="ma_xe" id="ma_xe" class="form-control" value="" required>

                                        <option class="table tablesorter " value=" 0">Chọn Xe</option>
                                        @foreach ($arr_xe as $each)
                                        <option class="table tablesorter " value="{{$each->ma_xe}}">{{$each->ma_xe}} - {{$each->ten_xe}}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <br>
                                    <button type="submit" class="btn btn-fill btn-primary">
                                        {{ __('Thêm') }}
                                    </button>
                                </td>
                            </tr>
                    </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection