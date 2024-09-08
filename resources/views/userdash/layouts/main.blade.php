<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Any config settings you want to fetch you will get in $config array, -->
    <?php //echo $config['COMPANY']; ?>
    <title>{{isset($title)?$title:''}}</title>
    <!--<link rel="icon" type="image/png" href="{{asset(isset($favicon)?$favicon:'')}}">-->
    <link rel="icon" href="{{asset(isset($logo)?$logo->img_path:'')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('userdash.layouts.links')
    @yield('css')
  </head>
  <body>
      <!-- MOBILE-MENU START -->

  <div class="mobile-menu">
    <div class="mobile-close">
      <a href="javascript:void(0)" id="menu-close"><i class="fa fa-times"></i></a>
    </div>
    <div class="mobile-menu-body" id="mobile-menu-body"></div>
  </div>

  <!-- MOBILE-MENU END -->
    <input type="hidden" id="web_base_url" value="{{url('/')}}"/>
    @include('userdash.layouts.header')
    @yield('content')
    @include('userdash.layouts.footer')
    @include('userdash.layouts.scripts')
    @yield('js')
    <script type="text/javascript">
(()=>{

		@if (session('notify_success'))
		$.toast({
				heading: 'Success!',
				position: 'bottom-right',
				text:  '{{session('notify_success')}}',
				loaderBg: '#ff6849',
				icon: 'success',
				hideAfter: 2000,
				stack: 6
			});
      @elseif (session('notify_error'))
      $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  '{{session('notify_error')}}',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
        @endif

})()
    </script>
    @include('userdash.layouts.errorhandler')
   
  </body>
</html>