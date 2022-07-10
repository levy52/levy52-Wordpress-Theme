<?php
get_header();
?>

<div class="container mb-4 mt-5 text-color">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            
            <div class="row">
                <?php get_template_part('/template-parts/loop', 'index'); ?>

                <?php
                the_posts_pagination();
                ?>

                <?php // LOAD MORE BUTTON 
                global $wp_query;
                // don't display the button if there are not enough posts
                if ($wp_query->max_num_pages > 1)

                    echo '<div class="btn btn-sample levy52_loadmore"><span class="load">' . __('Loading', 'levy52') . '</span><span class="more">' . __('More posts', 'levy52') . '</span></div>';
                ?>
            </div>
        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>
</div>

<?php
get_footer();
