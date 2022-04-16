@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Thống kê</h2>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Bác Sĩ</h4>
                        </div>
                        @foreach($doctor as $each)
                        <div class="card-body">
                            {{ $each->TongBacSi }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Khách Hàng</h4>
                        </div>
                        @foreach($customer as $cus)
                        <div class="card-body">
                            {{ $cus->TongKhach }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Lượt Đặt</h4>
                        </div>
                        @foreach($appointment as $app)
                        <div class="card-body">
                            {{ $app->TongDat }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Bệnh Án</h4>
                        </div>
                        @foreach($medical as $medi)
                        <div class="card-body">
                            {{ $medi->TongBenh }}
                        </div>
                        @endforeach
                    </div>
                    {{-- @php--}}
                    {{-- dd($data);--}}
                    {{-- @endphp--}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <div class="row">

                <div class="col-5">
                    <select class="form-control" name="month" id="month">
                        <option value="0">--Chọn Tháng--</option>
                        @for($i = 1;$i<=12;$i++) <option value="{{$i}}" @if ($i==date('m')) selected @endif>{{$i}}</option>
                            @endfor
                    </select>
                </div>
                <div class="col-5 ">
                    <select class="form-control" name="year" id="year">
                        <option value="0">--Chọn Năm--</option>
                        @for($i = date('Y');$i>=1900;$i--)
                        <option value="{{$i}}" @if ($i==date('Y')) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <canvas id="chart_demo"></canvas>
    </div>
</div>

@endsection
<!-- @push('js')
<script type="text/javascript">
    $(document).ready(function() {
        let myChart;
        var chart_option = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                    }
                }]
            }
        };
        $.ajax({
                url: '{{ route('
                admin.thong_ke ') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    month: $("#month").val(),
                    year: $("#year").val()
                },
            })
            .done(function(response) {
                var ctx = document.getElementById('chart_demo').getContext('2d');
                var chart_data = {
                    labels: response.array_name_subspecialty,
                    datasets: [{
                        label: 'Lượt Đặt',
                        data: response.array_tong,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                };

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: chart_data,
                    options: chart_option
                });

            });

        $("#month,#year").change(function() {
            //   alert($("#year").val());
            $.ajax({
                    url: '{{ route('
                    admin.thong_ke ') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        month: $("#month").val(),
                        year: $("#year").val()
                    },
                })
                .done(function(response) {
                    var chart_data = {
                        labels: response.array_name_subspecialty,
                        datasets: [{
                            label: 'Lượt đặt',
                            data: response.array_tong,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 0,
                        }]
                    };
                    myChart.data = chart_data;
                    myChart.update();
                });
        });
    });
</script>
@endpush -->