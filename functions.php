<?php

function levy52_scripts()
{ // style, style bootstrap i js bootstrap
  wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
  wp_enqueue_style('levy52_style', get_stylesheet_uri());
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', false, null);
}

function levy52_setup()
{
  // Własne logo w motywie
  add_theme_support('custom-logo', array(
    'height'      => 200, // wysokość logo
    'width'       => 100, // szerokość logo
    'flex-height' => false, // czy wysokość ma być elastyczna
    'flex-width'  => true, // czy szerokość ma być elastyczna
  )); //własny nagłówek w motywie
  add_theme_support('custom-header', array(
    'default-image'  => get_template_directory_uri() . '/includes/img/default-header-rain.jpg', // domyślne zdjęcie
    'header-text'    => false, // czy razem z obrazkiem chcemy jakiś tekst
    'width'          => 2000, // szerokość nagłówka
    'height'         => 280, // wysokość nagłówka
    'flex-height'    => true, // czy wysokość może być elastyczna
  ));
}

add_action('after_setup_theme', 'levy52_setup');
add_theme_support('post-thumbnails', array('post', 'page'));
add_action('wp_enqueue_scripts', 'levy52_scripts');

// Bootstrap Navwalker -->

function register_navwalker()
{
  require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

function prefix_modify_nav_menu_args($args)
{
  return array_merge($args, array(
    'walker' => new WP_Bootstrap_Navwalker(),
  ));
}
add_filter('wp_nav_menu_args', 'prefix_modify_nav_menu_args');

add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
  if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
    if (array_key_exists('data-toggle', $atts)) {
      unset($atts['data-toggle']);
      $atts['data-bs-toggle'] = 'dropdown';
    }
  }
  return $atts;
}

function slug_provide_walker_instance($args)
{
  if (isset($args['walker']) && is_string($args['walker']) && class_exists($args['walker'])) {
    $args['walker'] = new $args['walker'];
  }
  return $args;
}
add_filter('wp_nav_menu_args', 'slug_provide_walker_instance', 1001);


// Rejestracja menu
register_nav_menus(array(
  'primary' => __('Primary', 'main-menu'),
  'footer' => __('Secondary', 'footer-menu'),
  'footer_category' => __('Secondary-footer-category', 'footer-category'),
));

// Widget social media w stopce
function pm_widgets_init()
{
  register_sidebar(array(
    'name'          => 'Social Media',
    'id'            => 'socialmedia',
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ));
}
add_action('widgets_init', 'pm_widgets_init');

// Widget sidebar
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', '_s' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', '_s' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

// Load more posts 
function levy52_my_load_more_scripts() {
 
	global $wp_query; 
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'levy52_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'levy52_my_load_more_scripts' );

// Ajax Load more
function levy52_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( '/template-parts/loop', 'index');
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'levy52_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'levy52_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

// Go to top function

function my_scripts_method() {
  wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/topbutton.js',
        array( 'jquery' )
  );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );