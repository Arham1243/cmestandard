  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Users', 'Years'],
        ['2013', 1000, 400],
        ['2014', 1170, 460],
        ['2015', 660, 1120],
        ['2016', 1030, 540],
        ['2017', 1030, 540],
        ['2018', 1030, 540]
      ]);

      var options = {
        hAxis: { title: 'Year', titleTextStyle: { color: '#333' } },
        vAxis: { minValue: 0 }
      };

      var chart1 = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart1.draw(data, options);
    }
  </script>

  <script src="{{asset('admin/js/all.min.js')}}"></script>
  <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/ckeditor/config.js')}}"></script>
  <script src="{{asset('admin/js/custom.js')}}"></script>
  <script src="{{asset('js/jquery.toast.js')}}"></script>
  <script type="text/javascript">
(()=>{
    
  var Loader = function () {

return {

    show: function () {
        jQuery("#preloader").show();
    },

    hide: function () {
        jQuery("#preloader").hide();
    }
};

}();
    @if(session('crawl_success'))
    $('#crawl-success-alert-modal-1').modal('show'); 
    @endif
  /*in page css here*/

  $('.li-dropdown').on('click',function(){
        var dropdown = $(this).find('>.dropdown-content');
        if(!dropdown.hasClass('open')){
          dropdown.addClass('open');
          dropdown.slideDown(500);
        }else{
          dropdown.removeClass('open');
          dropdown.slideUp(500);
        }
      });

})();
  

</script>