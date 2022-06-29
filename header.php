<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="Author" content="Radosław Lewicki">
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if (get_header_image()) : ?>
        <div class="site-header container-fluid gx-0">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="100%" height="<?php echo absint(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </a>
        </div>
    <?php endif; ?>

    <nav class="navbar navbar-dark navbar-expand-md text-secondary border-bottom rich-black">
        <div class="container-fluid">
            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'levy52'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse center-menu',
                    'container_id'      => 'navbarSupportedContent',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => 'WP_Bootstrap_Navwalker',
                ));
                ?>
            </div>
        </div>
        <div class="search-icon ms-auto"><a href="#search"><img src="<?php echo get_template_directory_uri() ?> /assets/images/search-icon.png" /></a></div>
    </nav>
    <div id="search">
        <div class="close">x</div>
        <form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo("url"); ?>">
            <?php echo '<h3>' . __('Get set..', 'levy52') . '</h3>'; ?>
            <input type="search" value="" name="s" id="s" placeholder="<?php _e('type keyword(s) here', 'levy52'); ?>" aria-label="Search">
            <button type="submit" class="btn button-color" id="searchsubmit"><?php _e('Go for search', 'levy52') ?> </button>
        </form>
    </div>