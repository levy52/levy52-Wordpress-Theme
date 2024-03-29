<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="description" content="<?php bloginfo('description'); ?>"> -->
    <meta name="Author" content="Radosław Lewicki">
    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if (get_header_image()) : ?>
    <div class="site-header container-fluid gx-0">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="100%" height="100%"
                alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
        </a>
    </div>
    <?php endif; ?>

    <nav class="navbar navbar-dark navbar-expand-lg text-secondary border-bottom sticky-top rich-black">
        <div class="container position-relative">
            <div class="logo">
            <?php
            $logo = get_field('logo', 40); 
            $logo_hover = get_field('logo_hover', 40);
            ?>
            <img src="<?php echo $logo ?>" class="logo">
            <img src="<?php echo $logo_hover ?>" class="logo-hover">
            <a href="<?php echo home_url(); ?>" class="logo-link"></a>

            </div>
            <button id="navbar-toggler" class="navbar-toggler ms-auto" type="button" aria-label="Navbar Toggler">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="primary-menu order-2 order-lg-0" id="navbarSupportedContent">
                <div class="logo d-lg-none">
                    <?php the_custom_logo(); ?>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'center-menu justify-content-center',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => 'WP_Bootstrap_Navwalker',
                ));
                ?>
                <span id="closebtn" class="closebtn">&times;</span>
            </div>
            <div class="search-icon order-1"><a href="#search" title="<?php _e('Search', 'levy52')?>"><img
                        src="<?php echo get_template_directory_uri() ?>/assets/images/search-icon.png"
                        alt="Search icon" /></a></div>
        </div>
    </nav>
    <div id="search" class="search">
        <div class="close">x</div>
        <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo("url"); ?>">
            <?php echo '<h5>' . __('Get set..', 'levy52') . '</h5>'; ?>
            <input type="search" value="" name="s" id="s" placeholder="<?php _e('type keyword(s) here', 'levy52'); ?>"
                aria-label="Search">
            <button type="submit" class="btn-sample mt-4 m-auto"
                id="searchsubmit"><?php _e('Go for search', 'levy52') ?> </button>
        </form>
    </div>