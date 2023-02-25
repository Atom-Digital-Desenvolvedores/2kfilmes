$(document).ready(function() {

	$(".wsg-banner").owlCarousel({
		items:1,
		loop:true,
		nav: false,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		smartSpeed:2000,
		navText: [ '<span class="flaticon-left-arrow"></span>', '<span class="flaticon-right-arrow"></span>' ],
	});

	$(".wsg-parceiros-carousel").owlCarousel({
		loop:true,
		nav: false,
		navText:false,
		responsiveClass:true,
		smartSpeed:550,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			500:{
				items:2
			},
			740:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});
});
