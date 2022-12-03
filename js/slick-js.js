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
})
