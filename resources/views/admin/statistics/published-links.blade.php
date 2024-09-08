@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="quick-stats-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-12 col-12">
              <div class="primary-heading color-dark text-center">
                <h2>Published Links Statistics</h2>
              </div>
            </div>
            <!--<div class="col-lg-6 col-12">-->
            <!--  <div class="text-right">-->
            <!--    <a href="javascript:void(0)" class="primary-btn primary-bg">Download CSV Report</a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
         
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div id="curve_chart" style="width: 900px; height: 500px; margin: 0 auto"></div>
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
          ['Categories', 'Published Links'],
          @foreach($data as $k => $v)
        
          [<?php echo '"' .$k. '"'?>, <?php echo $v?> ],
         
          
         @endforeach
        ]);

        var options = {
          title: 'Categories & Their Respective Published Links',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    
</script>
(()=>{
  
  /*in page css here*/
})()
</script>
@endsection