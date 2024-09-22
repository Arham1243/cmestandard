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


                <div class="chart">
                    <div class="chart-title">Credit Hours</div>
                    <div class="chart-item">
                        <div id="creditHourChart"></div>
                    </div>
                </div>


                <div class="chart py-5">
                    <div class="chart-title">Duration</div>
                    <div class="chart-item">
                        <div id="durationChart"></div>
                    </div>
                </div>

                <div class="chart mt-5" id="month">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-6">
                            <div class="chart-title">Month/Year</div>
                        </div>
                        <div class="col-md-4">
                            <form id="yearForm" action="#month">
                                <div class="yearpicker-wrapper form-group w-100">
                                    <label for="year-picker"
                                        class="d-flex align-items-center justify-content-between">Select a Year:
                                        @if (isset($_GET['year']))
                                            <a href="{{ route('dashboard.analytics') }}#month" class="cross"
                                                id="clearSpeciality">
                                                <i class='bx bx-x'></i>
                                            </a>
                                        @endif
                                    </label>

                                    <select id="yearInput" class="form-control" name="year">
                                        @foreach ($userRegisteredYears as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="chart">
                    <div class="chart-subtitle">Monthly Overview</div>
                    <p>Total Trainings for <strong>{{ $currentYear }}</strong></p>
                    <div class="chart-item">
                        <div id="monthChart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>

                <div class="chart pt-5">
                    <div class="chart-subtitle">Quarterly Overview</div>
                    <p>Total Trainings for <strong>{{ $currentYear }}</strong></p>
                    <div class="chart-item">
                        <div id="quarterChart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>


                <div class="chart pt-5">
                    <div class="chart-subtitle">Yearly Overview</div>
                    <p>Total Trainings from {{ $userRegistrationYear }} to <strong>{{ $currentYearForYearly }}</strong></p>
                    <div class="chart-item">
                        <div id="yearChart" style="width: 900px; height: 500px;"></div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <div class="loader-mask" id="loader">
        <div class="loader"></div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <style type="text/css">
        /* Loader CSS */
        .loader-mask {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid var(--c1);
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .datepicker-inline {
            position: absolute;
            left: 0;
            top: 110%;
            z-index: 100;
            background: #fff;
            width: 100%;
            margin: auto;
            box-shadow: 0 0 15px 5px #00000020;
            padding: 1rem;
        }

        table.table-condensed {
            width: 100%;
        }

        .yearpicker-wrapper input {
            background: #fff !important
        }

        .pie {
            width: 700px;
            min-height: 400px;

        }
    </style>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader');
            loader.style.display = 'none';
        });

        $(document).ready(function() {
            const $yearInput = $("#yearInput");
            const $yearForm = $("#yearForm");

            // Set current year as the default value if it's within the allowed years
            const currentYear = {{ $currentYear }};
            if ([2020, 2021, 2022, 2023, 2024].includes(currentYear)) {
                $yearInput.val(currentYear);
            }

            // Submit form when year is changed
            $yearInput.on("change", function() {
                $yearForm.submit();
            });
        });



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
            drawCreditHoursChart();
            drawDurationChart();
            drawMonthChart();
            drawQuarterChart();
            drawYearChart();
        }

        function showMessage(data, elementId, message = 'No data available for this chart.') {
            if (data.getNumberOfRows() === 0) {
                document.getElementById(elementId).innerHTML = `<p class="no-data-message">${message}</p>`;
                return true;
            }
            return false; // Return false if there is data
        }

        function drawSpecialtyChart() {
            var data = google.visualization.arrayToDataTable([
                ['Specialty', 'Total Trainings'],
                @foreach ($specialtyTrainings as $training)
                    ['{{ $training['speciality_name'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);
            if (showMessage(data, 'specialtyPiechart')) {
                return;
            }

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
            if (showMessage(data, 'categoryPiechart')) {
                return;
            }

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
            if (showMessage(data, 'formatPiechart')) {
                return;
            }

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

            if (showMessage(data, 'typePiechart')) {
                return;
            }

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
            if (showMessage(data, 'contentPiechart')) {
                return;
            }


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

            if (showMessage(data, 'statusPiechart')) {
                return;
            }

            var chart = new google.visualization.PieChart(document.getElementById('statusPiechart'));
            chart.draw(data);
        }

        function drawCreditHoursChart() {
            var data = google.visualization.arrayToDataTable([
                ['Activity Title', 'Credit Hours'],
                @foreach ($creditHoursTrainings as $training)
                    ['{{ $training['activity_title'] }}', {{ $training['credit_hours'] }}],
                @endforeach
            ]);

            var options = {
                width: 800,
                height: 500, // Adjust this based on the number of activities
                bars: 'vertical', // Keep bars vertical
                hAxis: {
                    title: 'Training', // Activity titles on the horizontal axis
                    slantedText: true, // Slant the text if the titles are long
                    slantedTextAngle: 45 // Adjust the angle as needed
                },
                vAxis: {
                    title: 'Credit Hours' // Credit hours on the vertical axis
                },
                legend: {
                    position: 'none' // No need for a legend with one series
                },
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '100%',
                    height: '70%'
                }
            };
            if (showMessage(data, 'creditHourChart')) {
                return;
            }

            var chart = new google.visualization.ColumnChart(document.getElementById('creditHourChart'));
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
                width: 800,
                height: 500, // Adjust based on the number of durations
                bars: 'vertical', // Keep bars vertical
                hAxis: {
                    title: 'Duration', // Duration on the horizontal axis
                    slantedText: true, // Slant the text if needed
                    slantedTextAngle: 45 // Adjust angle for readability
                },
                vAxis: {
                    title: 'Total Trainings', // Training count on the vertical axis
                    format: '0', // Show integers only
                    viewWindow: {
                        min: 0 // Set the minimum to 0 (optional)
                    },
                    gridlines: {
                        count: -1 // Automatically adjust gridlines to match the number of integers
                    },
                },
                legend: {
                    position: 'none' // No legend needed for a single series
                },
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '100%',
                    height: '70%'
                }
            };

      

            var chart = new google.visualization.ColumnChart(document.getElementById('durationChart'));
            chart.draw(data, options);
        }

        function drawMonthChart() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Total Trainings'],
                @foreach ($monthlyTrainings as $training)
                    ['{{ $training['month'] }}', {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var options = {
                width: 800,
                height: 500,
                bars: 'vertical', // Keep bars vertical
                hAxis: {
                    title: 'Month',
                    slantedText: true,
                    slantedTextAngle: 45 // Adjust angle for readability
                },
                vAxis: {
                    title: 'Total Trainings',
                    format: '0' // Show integer values only
                },
                legend: {
                    position: 'none'
                },
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '100%',
                    height: '70%'
                }
            };
         
            var chart = new google.visualization.ColumnChart(document.getElementById('monthChart'));
            chart.draw(data, options);
        }

        function drawQuarterChart() {
            var data = google.visualization.arrayToDataTable([
                ['Quarter', 'Total Trainings', {
                    role: 'tooltip',
                    p: {
                        html: true
                    }
                }],
                @foreach ($allQuarters as $quarter)
                    ['{{ $quarter['quarter'] }}', {{ $quarter['total_trainings'] }},
                        createTooltip('{{ $quarter['total_trainings'] }}',
                            @json($quarter['month_details']))
                    ],
                @endforeach
            ]);

            var options = {
                width: 800,
                height: 500,
                bars: 'vertical',
                hAxis: {
                    title: 'Quarter',
                    slantedText: true,
                    slantedTextAngle: 45
                },
                vAxis: {
                    title: 'Total Trainings',
                    format: '0'
                },
                legend: {
                    position: 'none'
                },
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '100%',
                    height: '70%'
                },
                tooltip: {
                    isHtml: true
                } // Enable HTML tooltips
            };

          
            var chart = new google.visualization.ColumnChart(document.getElementById('quarterChart'));
            chart.draw(data, options);
        }

        // Create a tooltip string from the month details object
        function createTooltip(total, monthDetails) {
            var tooltipContent = '<div style="padding:5px;"><strong>Total Trainings: ' + total +
                '</strong><br/>';
            for (var month in monthDetails) {
                tooltipContent += month + ': ' + monthDetails[month] + ' <br/>';
            }
            tooltipContent += '</div>';
            return tooltipContent;
        }





        function drawYearChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Total Trainings'],
                @foreach ($yearlyTrainings as $training)
                    ["{{ $training['year'] }}", {{ $training['total_trainings'] }}],
                @endforeach
            ]);

            var options = {
                width: 800,
                height: 500,
                bars: 'vertical',
                hAxis: {
                    title: 'Year',
                    slantedText: true,
                    slantedTextAngle: 45,
                    format: 0
                },
                vAxis: {
                    title: 'Total Trainings',
                    format: '0'
                },
                legend: {
                    position: 'none'
                },
                chartArea: {
                    left: 50,
                    top: 50,
                    width: '100%',
                    height: '70%'
                }
            };

          

            var chart = new google.visualization.ColumnChart(document.getElementById('yearChart'));
            chart.draw(data, options);
        }
    </script>
@endsection
