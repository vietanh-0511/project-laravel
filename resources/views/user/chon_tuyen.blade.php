@extends('user/user_layout')
@section('user_content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Danh sách tuyến xe chạy</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <form method="POST" action="" autocomplete="off">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td style="font-weight:550;">
                                        Chọn tuyến
                                    </td>
                                    <td>
                                        <select name="tuyen_duong" id="tuyen_duong" class="form-control" value="" required>
                                            <option class="table tablesorter " value=" 0">Chọn Tuyến Đường</option>
                                            @foreach ($arr_tuyen as $each)
                                            <option class="table tablesorter" value="{{$each->ma_tuyen}}">{{$each->tuyen_duong}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                        </table>
                        </form>
                    </div>

                    <div class="card card-user" id="cardcard-user" style="padding-top: 100px">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('js')
    <script>
        $(document).ready(function() {
            $("#tuyen_duong").change(function() {
                $.ajax({
                    url: '{{ route('ajax.xe_theo_tuyen')}}',
                    type: 'GET',
                    data: {
                        ma_tuyen: $("#tuyen_duong").val(),
                    },
                    success: function(data) {
                        $('#cardcard-user').html(data);
                    }
                });
            });
        });
    </script>
    @endpush