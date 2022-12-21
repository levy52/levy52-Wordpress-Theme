jQuery(document).ready(function ($) {
	$('.one-time').slick({
		dots: true,
		infinite: true,
		speed: 800,
		slidesToShow: 3,
		adaptiveHeight: true,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})

	$('.home-slider').slick({
		infinite: false,
		arrows: false,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		mobileFirst: true,
		dots: true,
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					dots: true,
				},
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true,
				},
			},
			{
				breakpoint: 1399,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true,
				},
			},
		],
	})
})
