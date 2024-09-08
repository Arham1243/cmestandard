  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


  <script src="{{ asset('admin/js/all.min.js') }}"></script>
  <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('admin/js/ckeditor/config.js') }}"></script>

  <script src="{{ asset('admin/js/custom.js') }}"></script>
  <script src="{{ asset('dash/js/jquery.toast.js') }}"></script>
  <script type="text/javascript">
      (() => {

          var Loader = function() {

              return {

                  show: function() {
                      jQuery("#preloader").show();
                  },

                  hide: function() {
                      jQuery("#preloader").hide();
                  }
              };

          }();
          @if (session('crawl_success'))
              $('#crawl-success-alert-modal-1').modal('show');
          @endif
          /*in page css here*/

          $('.li-dropdown').on('click', function() {
              var dropdown = $(this).find('>.dropdown-content');
              if (!dropdown.hasClass('open')) {
                  dropdown.addClass('open');
                  dropdown.slideDown(500);
              } else {
                  dropdown.removeClass('open');
                  dropdown.slideUp(500);
              }
          });

      })();
      
  </script>
