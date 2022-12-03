jQuery(function ($) {
	// use jQuery code inside this to avoid "$ is not defined" error
	$('.levy52_loadmore').click(function () {
		var button = $(this),
			data = {
				action: 'loadmore',
				query: levy52_loadmore_params.posts, // that's how we get params from wp_localize_script() function
				page: levy52_loadmore_params.current_page,
			}

		$.ajax({
			// you can also use $.post here
			url: levy52_loadmore_params.ajaxurl, // AJAX handler
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.addClass('load') // change the button text, you can also add a preloader image
			},
			success: function (data) {
				if (data) {
					button.removeClass('load').prev().before(data) // insert new posts
					levy52_loadmore_params.current_page++

					if (levy52_loadmore_params.current_page == levy52_loadmore_params.max_page) button.remove() // if last page, remove the button

					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove() // if no data, remove the button as well
				}
			},
		})
	})

	$('.loadmore2').click(function () {
		//custom query on front-page.php
		var button = $(this),
			data = {
				action: 'loadmore',
				query: posts_myajax,
				page: current_page_myajax,
			}

		$.ajax({
			url: '/wp-admin/admin-ajax.php', // AJAX handler
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.addClass('load') // change the button text, you can also add a preloader image
			},
			success: function (data) {
				if (data) {
					button.removeClass('load').prev().before(data) // insert new posts
					current_page_myajax++

					if (current_page_myajax == max_page_myajax) button.remove() // if last page, remove the button
				} else {
					//button.remove(); // if no data, remove the button as well
				}
			},
		})
	})
})
