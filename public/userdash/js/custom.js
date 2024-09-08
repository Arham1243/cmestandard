$(document).ready(function () {

	// MOBILE-NAVIGATION-LIST

	$('.navigation-list').clone().appendTo('.mobile-menu-body');
	$('.mobile-menu-body .navigation-list a').removeClass();

	$('.hamburger').on('click', function () {
		if($('.mobile-menu').length){
			console.log('Working');
			if (!$('.mobile-menu').hasClass('mobile-view')) {
				$('.mobile-menu').addClass('mobile-view');
			} else {
				$('.mobile-menu').removeClass('mobile-view');
			}
		}else if($('.dashboard-sidebar').length){
			if(!$('.dashboard-sidebar').hasClass('.show')){
				$('.dashboard-sidebar').addClass('show');
			}
		}
	});

	$('#menu-close,.dashboard-sidebar-close>a').on('click', function () {
		if($('.mobile-menu').length){
			$('.mobile-menu').removeClass('mobile-view');
			$('.dropdown-li').removeClass('open');
			$('.dropdown-li').find('>.dropdown-list').hide(200);
		}else if($('.dashboard-sidebar').length){
			$('.dashboard-sidebar').removeClass('show');
		}
	});

	$('.mobile-menu .dropdown-li>a').append('<i class="fa fa-angle-right"></i>')

	$('.mobile-menu .dropdown-li>a').click(function () {
		const parent = $(this).parent('.dropdown-li');
		if (!parent.hasClass('open')) {
			const ulParent = parent.parent();
			ulParent.find('.dropdown-li.open').find('>.dropdown-list').hide(200);
			ulParent.find('.dropdown-li.open').removeClass('open');
			parent.addClass('open');
			parent.find('>.dropdown-list').show(200);
		} else {
			parent.removeClass('open');
			parent.find('>.dropdown-list').hide(200);
		}
	});


	// $('#multifile-picker').imageuploadify();

	// DATE PICKER JS
	$('.date-picker').datepicker();

	$("#datepicker").datepicker();

	// DATATABLES JS
	$('#data-table').DataTable();


	// SCROLL JS

	// $('.scroller').mCustomScrollbar();

	// WOW JS

	new WOW().init();

	// REVIEW SLIDER JS

	$('.reviews-slider').slick({
		dots: false,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 3,
					dots: true,
					arrows: false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true,
					arrows: false
				}
			}
		]
	});


});


