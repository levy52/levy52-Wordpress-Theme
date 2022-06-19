<?php
get_header();
?>

<div class="container mt-2 mb-4 mt-5 text-color">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <div class="row">
            
               
                    <header class="page-header">
                        <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'levy52'), get_search_query()); ?></h1>
                    </header>

                <?php get_template_part('/template-parts/loop', 'index'); ?>

                <?php
                the_posts_pagination();
                ?>

                <?php // LOAD MORE BUTTON 
                global $wp_query;
                // don't display the button if there are not enough posts
                if ($wp_query->max_num_pages > 1)
                    echo '<div class="levy52_loadmore">More posts</div>';
                ?>

            </div>
        </div>
        <?php get_sidebar('sidebar'); ?>
    </div> 
</div> 

<?php
get_footer();