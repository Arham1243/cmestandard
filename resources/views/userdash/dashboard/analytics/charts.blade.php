@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <div class="chart">
                    <div class="chart-title">Specialty</div>
                    <div class="chart-item">
                        <div id="piechart" class="pie"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        .pie {
            width: 700px;
            height: 400px;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data);
        }
    </script>
@endsection
