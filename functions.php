<?php

function levy52_scripts()
{
  wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css');
  wp_enqueue_style('levy52_style', get_stylesheet_uri());
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', false, null);
  wp_enqueue_script('searchbox', get_template_directory_uri() . '/js/searchbox.js', array('jquery'));
}

function levy52_setup()
{

  add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 200,
    'flex-height' => false,
    'flex-width'  => true,
  ));
  add_theme_support('custom-header', array(
    'default-image'  => get_template_directory_uri() . '/assets/images/default-header-rain.png',
    'header-text'    => false,
    'width'          => 2000,
    'height'         => 280,
    'flex-height'    => true,
  ));
}

add_action('after_setup_theme', 'levy52_setup');
add_theme_support('post-thumbnails', array('post', 'page'));
add_action('wp_enqueue_scripts', 'levy52_scripts');
load_theme_textdomain('levy52', get_template_directory() . '/languages');


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

register_nav_menus(array(
  'primary' => __('Primary', 'main-menu'),
  'footer' => __('Secondary', 'footer-menu'),
  'footer_category' => __('Secondary-footer-category', 'footer-category'),
));

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

function _s_widgets_init()
{
  register_sidebar(array(
    'name'          => esc_html__('Sidebar', '_s'),
    'id'            => 'sidebar',
    'description'   => esc_html__('Add widgets here.', '_s'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', '_s_widgets_init');

function widget_company_name()
{
  register_sidebar(array(
    'name'          => 'Company name',
    'id'            => 'companyname',
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ));
}
add_action('widgets_init', 'widget_company_name');

function widget_contact()
{
  register_sidebar(array(
    'name'          => 'Contact',
    'id'            => 'contact',
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => ' ',
    'after_title'   => ' ',
  ));
}
add_action('widgets_init', 'widget_contact');

function levy52_my_load_more_scripts()
{
  global $wp_query;

  wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery'));
  wp_localize_script('my_loadmore', 'levy52_loadmore_params', array(
    'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    'posts' => json_encode($wp_query->query_vars),
    'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
    'max_page' => $wp_query->max_num_pages
  ));

  wp_enqueue_script('my_loadmore');
}

add_action('wp_enqueue_scripts', 'levy52_my_load_more_scripts');

function levy52_loadmore_ajax_handler()
{


  $args = json_decode(stripslashes($_POST['query']), true);
  $args['paged'] = $_POST['page'] + 1;
  $args['post_status'] = 'publish';

  query_posts($args);
  get_template_part('/template-parts/loop', 'index');
  die;
}

add_action('wp_ajax_loadmore', 'levy52_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'levy52_loadmore_ajax_handler');

function my_scripts_method()
{
  wp_enqueue_script(
    'custom-script',
    get_stylesheet_directory_uri() . '/js/topbutton.js',
    array('jquery')
  );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

function add_slick()
{
  wp_enqueue_style('slider', get_template_directory_uri() . '/assets/components/slick/slick.css', array(), '1.0', 'all');

  wp_enqueue_style('slider-theme', get_template_directory_uri() . '/assets/components/slick/slick-theme.css', array(), '1.0', 'all');

  wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/assets/components/slick/slick.js', array(), '1.0.0', false);

  wp_enqueue_script('slick-script-js', get_stylesheet_directory_uri() . '/js/slick-js.js', array(), '1.0.0', false);
}
add_action('wp_enqueue_scripts', 'add_slick');

function wpbeginner_remove_comment_url($arg)
{
  $arg['url'] = '';
  return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

function wpb_posts_nav()
{
  $next_post = get_next_post();
  $prev_post = get_previous_post();

  if ($next_post || $prev_post) : ?>

<div class="row wpb-posts-nav">
    <div class="col-12 col-lg-6 mb-4 mt-4">
        <?php if (!empty($prev_post)) : ?>
        <a href="<?php echo get_permalink($prev_post); ?>">
            <div>
                <div class="wpb-posts-nav__thumbnail wpb-posts-nav__prev">
                    <?php echo get_the_post_thumbnail($prev_post, [80, 80]); ?>
                </div>
            </div>
            <div>
                <strong>
                    <?php _e('Previous article', 'levy52') ?>
                </strong>
                <h6><?php echo get_the_title($prev_post); ?></h6>
            </div>
        </a>
        <?php endif; ?>
    </div>
    <div class="col-12 col-lg-6 d-flex flex-nowrap justify-content-lg-end mb-4 mt-lg-4">
        <?php if (!empty($next_post)) : ?>
        <a href="<?php echo get_permalink($next_post); ?>">
            <div class="order-2 order-lg-1">
                <strong>
                    <?php _e('Next article', 'levy52') ?>
                </strong>
                <h6><?php echo get_the_title($next_post); ?></h6>
            </div>
            <div class="order-1 order-lg-2">
                <div class="wpb-posts-nav__thumbnail wpb-posts-nav__next">
                    <?php echo get_the_post_thumbnail($next_post, [80, 80]); ?>
                </div>
            </div>
        </a>
        <?php endif; ?>
    </div>
</div>

<?php endif;
}

add_theme_support('responsive-embeds');

add_action('wp_print_scripts', function () {
  global $post;
  if (is_a($post, 'WP_Post') && !has_shortcode($post->post_content, 'contact-form-7')) {
    wp_dequeue_script('google-recaptcha');
    wp_dequeue_script('wpcf7-recaptcha');
  }
});

add_filter('wp_title', 'wpdocs_hack_wp_title_for_home');
function wpdocs_hack_wp_title_for_home($title)
{
  if (empty($title) && (is_home() || is_front_page())) {
    $title = __('Home', 'levy52') . '' . get_bloginfo('description');
  }
  return $title;
}

add_theme_support('yoast-seo-breadcrumbs');

add_filter('get_the_excerpt', 'wpse_367505_excerpt');
function wpse_367505_excerpt($excerpt)
{
  return substr($excerpt, 0, 150) . '..';
}

function SearchFilter($query)
{
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'SearchFilter');