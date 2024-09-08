@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="quick-stats-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-12 col-12">
              <div class="primary-heading color-dark text-center">
                <h2>Inquiries Statistics</h2>
              </div>
            </div>
            <!--<div class="col-lg-6 col-12">-->
            <!--  <div class="text-right">-->
            <!--    <a href="javascript:void(0)" class="primary-btn primary-bg">Download CSV Report</a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
         
        </div>
        <div class="row align-items-center mc-b-3">
            <div class="col-lg-12 col-md-12 col-12">
                <div id="columnchart_values" style="width: 1000px; height: 500px; margin: 0 auto"></div>
                <!--<div id="curve_chart" style="width: 900px; height: 500px; margin: 0 auto"></div>-->
            </div>
        </div>
        <!--<div class="user-wrapper">-->
        <!--  <div class="row align-items-center mc-b-3">-->
        <!--    <div class="col-lg-6 col-12">-->
        <!--      <div class="primary-heading color-dark">-->
        <!--        <h2>Users</h2>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--    <div class="col-lg-6 col-12">-->
        <!--      <div class="text-right">-->
                <!-- <a href="javascript:void(0)" class="primary-btn primary-bg">Add New</a> -->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->

         
          

        </div>
      </div>
    </div>

  </section>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        //   var keyword = '';
        //   var link = '';
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Inquiry Count'],
          @foreach($data as $k => $v)
        
          [<?php echo '"' .$k. '"'?>, <?php echo $v?> ],
         
          
         @endforeach
        ]);

        // var options = {
        //   title: 'Inquiries & Their Monthly Count',
        //   curveType: 'function',
        //   legend: { position: 'bottom' }
        // };
        var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" }
                       ]);
        
        var options = {
        title: 'Inquiries & Their Monthly Count',
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };

        // var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        // chart.draw(data, options);
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
      }
    
</script>
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection