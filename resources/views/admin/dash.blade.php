@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('body')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">TODAY</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 fs-5">Massage Services (Today)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card1">
                                {{ ReadableNumber(
                                    DB::table('queues')->whereDate('start_time', today())->count(),
                                ) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-5">Earnings (Today)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card2">
                                ${{ ReadableNumber(
                                    DB::table('queues')->LeftJoin('massages', 'queues.massage_id', '=', 'massages.id')->select('massages.massage_price')->whereDate('queues.start_time', today())->sum('massages.massage_price'),
                                ) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 fs-5">Massage Services (Yesterday)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card3"> {{ ReadableNumber(
                                DB::table('queues')->whereDate('start_time', date('Y-m-d', strtotime('-1 days')))->count(),
                            ) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 fs-5">Earnings (Yesterday)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card4">${{ ReadableNumber(
                                DB::table('queues')->LeftJoin('massages', 'queues.massage_id', '=', 'massages.id')->select('massages.massage_price')->whereDate('queues.start_time', date('Y-m-d', strtotime('-1 days')))->sum('massages.massage_price'),
                            ) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">THIS MONTH</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 fs-5">Massage Services (This month)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card1">
                                {{ ReadableNumber(
                                    DB::table('queues')->whereMonth('queues.start_time',  date('m'))->count(),
                                ) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-5">Earnings (This month)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card2">
                                ${{ ReadableNumber(
                                    DB::table('queues')->LeftJoin('massages', 'queues.massage_id', '=', 'massages.id')->select('massages.massage_price')->whereMonth('queues.start_time',  date('m'))->sum('massages.massage_price'),
                                ) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 fs-5">Massage Services (last month)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card3"> {{ ReadableNumber(
                                DB::table('queues')->whereMonth('start_time', date('m', strtotime('-1 months')))->count(),
                             
                            ) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 fs-5">Earnings (last month)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="card4">${{ ReadableNumber(
                                DB::table('queues')->LeftJoin('massages', 'queues.massage_id', '=', 'massages.id')->select('massages.massage_price')->whereMonth('queues.start_time',  date('m', strtotime('-1 months')))->sum('massages.massage_price'),
                            ) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart (This year)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>   
                </div>
            </div>
        </div>
    @endsection
   
    @section('js')
        <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = 'Nunito',
                    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';

                function number_format(number, decimals, dec_point, thousands_sep) {
                    // *     example: number_format(1234.56, 2, ',', ' ');
                    // *     return: '1 234,56'
                    number = (number + '').replace(',', '').replace(' ', '');
                    var n = !isFinite(+number) ? 0 : +number,
                        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                        s = '',
                        toFixedFix = function(n, prec) {
                            var k = Math.pow(10, prec);
                            return '' + Math.round(n * k) / k;
                        };
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                    if (s[0].length > 3) {
                        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                    }
                    if ((s[1] || '').length < prec) {
                        s[1] = s[1] || '';
                        s[1] += new Array(prec - s[1].length + 1).join('0');
                    }
                    return s.join(dec);
                }

                // Area Chart Example
                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: [],
                        datasets: [{
                            label: "Earnings",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: [],
                        }],
                    },
                    options: {
                        maintainAspectRatio: false,
                        layout: {
                            padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                            }
                        },
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function(value, index, values) {
                                        return '$' + number_format(value);
                                    }
                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }],
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            intersect: false,
                            mode: 'index',
                            caretPadding: 10,
                            callbacks: {
                                label: function(tooltipItem, chart) {
                                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                    return datasetLabel + ': $' + (tooltipItem.yLabel);
                                }
                            }
                        }
                    }
                });
                function getMonthShortName(monthNo) {
                    const date = new Date();
                    date.setMonth(monthNo - 1);

                    return date.toLocaleString('zh-CN', { month: 'short' }); //zh-CN
                }
                function removeData(chart) {
                    //chart.data.labels.pop();
                    chart.data.datasets[0].data = []
                    chart.data.labels = []

                    @php(
                    $dataja = DB::table('queues')->LeftJoin('massages', 'queues.massage_id', '=', 'massages.id')
                    ->select(DB::raw('sum(massages.massage_price) as price'),DB::raw('count(queues.id) as count'),DB::raw("(DATE_FORMAT(queues.created_at, '%m')) as month_year"))
                    ->whereYear('queues.created_at', date('Y'))
                    ->groupBy(DB::raw("DATE_FORMAT(queues.created_at, '%m')"))->get() 
                    )
                    @foreach ($dataja as $value)
                        chart.data.labels.push(getMonthShortName({{ $value->month_year}}));
                        chart.data.datasets[0].data.push({{ $value->price}});
                    @endforeach

                    chart.update();
                }
                removeData(myLineChart)
                setInterval(function() {
                    removeData(myLineChart)
                    //$("#myAreaChart").load(" #myAreaChart");
                    //$("#card1").load(" #card1");
                    //$("#card2").load(" #card2");
                    //$("#card3").load(" #card3");
                    //$("#card4").load(" #card4");
                }, 5000);
            });
        </script>
    @endsection
