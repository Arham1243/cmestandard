@extends('userdash.layouts.dashboard.main')

@section('content')
    <section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-form-sec">
                <!-- Specialty Chart -->
                <div class="chart">
                    <div class="chart-title">Specialty</div>
                    <div class="chart-item">
                        <div id="specialtyPiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Category Chart -->
                <div class="chart">
                    <div class="chart-title">Category</div>
                    <div class="chart-item">
                        <div id="categoryPiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Format Chart -->
                <div class="chart">
                    <div class="chart-title">Format</div>
                    <div class="chart-item">
                        <div id="formatPiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Type Chart -->
                <div class="chart">
                    <div class="chart-title">Type</div>
                    <div class="chart-item">
                        <div id="typePiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Content Chart -->
                <div class="chart">
                    <div class="chart-title">Content</div>
                    <div class="chart-item">
                        <div id="contentPiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Status Chart -->
                <div class="chart">
                    <div class="chart-title">Status</div>
                    <div class="chart-item">
                        <div id="statusPiechart" class="pie"></div>
                    </div>
                </div>

                <!-- Credit Tours Bar Chart -->
                <div class="chart">
                    <div class="chart-title">Credit Tours</div>
                    <div class="chart-item">
                        <div id="creditToursBarchart" class="bar"></div>
                    </div>
                </div>

                <!-- Duration Bar Chart -->
                <div class="chart">
                    <div class="chart-title">Duration</div>
                    <div class="chart-item">
                        <div id="durationBarchart" class="bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style type="text/css">
        .pie {
            width: 700px;
            height: 400px;
        }

        .bar {
            width: 700px;
            height: 400px;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawSpecialtyChart();
            drawCategoryChart();
            drawFormatChart();
            drawTypeChart();
            drawContentChart();
            drawStatusChart();
            drawCreditToursChart();
            drawDurationChart();
        }


        function drawSpecialtyChart() {
            var data = google.visualization.arrayToDataTable([
                ['Specialty', 'Total Trainings'],
                @foreach ($specialtyTrainings as $training)
                    ['{{ $training['speciality_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('specialtyPiechart'));
            chart.draw(data);
        }

        function drawCategoryChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Total Trainings'],
                @foreach ($categoryTrainings as $training)
                    ['{{ $training['category_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('categoryPiechart'));
            chart.draw(data);
        }

        function drawFormatChart() {
            var data = google.visualization.arrayToDataTable([
                ['Format', 'Total Trainings'],
                @foreach ($formatTrainings as $training)
                    ['{{ $training['format_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('formatPiechart'));
            chart.draw(data);
        }

        function drawTypeChart() {
            var data = google.visualization.arrayToDataTable([
                ['Type', 'Total Trainings'],
                @foreach ($typeTrainings as $training)
                    ['{{ $training['type_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('typePiechart'));
            chart.draw(data);
        }

        function drawContentChart() {
            var data = google.visualization.arrayToDataTable([
                ['Content', 'Total Trainings'],
                @foreach ($contentTrainings as $training)
                    ['{{ $training['content_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('contentPiechart'));
            chart.draw(data);
        }

        function drawStatusChart() {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Total Trainings'],
                @foreach ($statusTrainings as $training)
                    ['{{ $training['status_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var chart = new google.visualization.PieChart(document.getElementById('statusPiechart'));
            chart.draw(data);
        }

        function drawCreditToursChart() {
            var data = google.visualization.arrayToDataTable([
                ['Credit Hours', 'Total Trainings'],
                @foreach ($creditToursTrainings as $training)
                    ['{{ $training['credit_hours'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var options = {
                hAxis: {
                    title: 'Total Trainings',
                    minValue: 0
                },
                vAxis: {
                    title: 'Credit Hours'
                },
                bars: 'horizontal' // Make the bar chart horizontal
            };

            var chart = new google.visualization.BarChart(document.getElementById('creditToursBarchart'));
            chart.draw(data, options);
        }

        function drawDurationChart() {
            var data = google.visualization.arrayToDataTable([
                ['Duration', 'Total Trainings'],
                @foreach ($durationTrainings as $training)
                    ['{{ $training['duration'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var options = {
                hAxis: {
                    title: 'Total Trainings',
                    minValue: 0
                },
                vAxis: {
                    title: 'Duration'
                },
                bars: 'horizontal' // Make the bar chart horizontal
            };

            var chart = new google.visualization.BarChart(document.getElementById('durationBarchart'));
            chart.draw(data, options);
        }
    </script>
@endsection
