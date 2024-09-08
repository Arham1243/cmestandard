<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('dash/js/bootstrap.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('js/jquery.toast.js')}}"></script>
<script src="{{asset('dash/js/slick.js')}}"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
    <script type="text/javascript">
		jQuery('.responsive-menu-btn1').click(function () {
			jQuery('.responsive-dashboard-main').toggleClass('active');
		})
	</script>

<script>

$(document).ready(function () {

	@if(\Session::has('message'))
	$.toast({
		heading: 'Success!',
		position: 'bottom-right',
		text:  '{{session()->get('message')}}',
		loaderBg: '#ff6849',
		icon: 'success',
		hideAfter: 3000,
		stack: 6
	});
	@endif


	@if(\Session::has('flash_message'))
	$.toast({
		heading: 'Error!',
		position: 'bottom-right',
		text:  '{{session()->get('flash_message')}}',
		loaderBg: '#ff6849',
		icon: 'error',
		hideAfter: 3000,
		stack: 6
	});
	@endif

	$("#eventsdash").click(function(){
  @if (isset(Auth::user()['type']))
	@if(Auth::user()['type']==2)
	$('#modal1').modal('show');
	@else
	$.toast({
			heading: 'error!',
			position: 'bottom-right',
			text:  'You need to be a seller to post events!',
			loaderBg: '#ff6849',
			icon: 'error',
			hideAfter: 2000,
			stack: 6
		});
	@endif
	
  @else
  $.toast({
		heading: 'error!',
		position: 'bottom-right',
		text:  'You need to be a seller to post events!',
		loaderBg: '#ff6849',
		icon: 'error',
		hideAfter: 2000,
		stack: 6
	});
  @endif
});


$("#productsdash").click(function(){
  @if (isset(Auth::user()['type']))
	@if(Auth::user()['type']==2)
	$('#modal2').modal('show');
	@else
	$.toast({
			heading: 'error!',
			position: 'bottom-right',
			text:  'You need to be a seller to post products!',
			loaderBg: '#ff6849',
			icon: 'error',
			hideAfter: 2000,
			stack: 6
		});
	@endif
  @else
  $.toast({
		heading: 'error!',
		position: 'bottom-right',
		text:  'You need to be a seller to post products!',
		loaderBg: '#ff6849',
		icon: 'error',
		hideAfter: 2000,
		stack: 6
	});
  @endif
});

$("#posteventsdash").click(function(){
  @if (isset(Auth::user()['type']))
	@if(Auth::user()['type']==2)
	$('#modal1').modal('show');
	@else
	$.toast({
			heading: 'error!',
			position: 'bottom-right',
			text:  'You need to be a seller to post events!',
			loaderBg: '#ff6849',
			icon: 'error',
			hideAfter: 2000,
			stack: 6
		});
	@endif
	
  @else
  $.toast({
		heading: 'error!',
		position: 'bottom-right',
		text:  'You need to be a seller to post events!',
		loaderBg: '#ff6849',
		icon: 'error',
		hideAfter: 2000,
		stack: 6
	});
  @endif
});


$("#postproductsdash").click(function(){
  @if (isset(Auth::user()['type']))
	@if(Auth::user()['type']==2)
	$('#modal2').modal('show');
	@else
	$.toast({
			heading: 'error!',
			position: 'bottom-right',
			text:  'You need to be a seller to post products!',
			loaderBg: '#ff6849',
			icon: 'error',
			hideAfter: 2000,
			stack: 6
		});
	@endif
  @else
  $.toast({
		heading: 'error!',
		position: 'bottom-right',
		text:  'You need to be a seller to post products!',
		loaderBg: '#ff6849',
		icon: 'error',
		hideAfter: 2000,
		stack: 6
	});
  @endif
});


})

</script>
