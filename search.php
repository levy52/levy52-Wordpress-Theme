<?php
get_header();
?>

<div class="container mt-2 mb-4 mt-5 text-color">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <div class="row">
                <div class="page-header">
                    <h1 class="page-title">
                        <?php printf(esc_html__('Search Results for: %s', 'levy52'), get_search_query()); ?></h1>
                </div>
                <hr>
                <?php get_template_part('/template-parts/loop', 'index'); ?>

                <?php
                the_posts_pagination();
                ?>
                <?php
                global $wp_query;
                if ($wp_query->max_num_pages > 1)
                    echo '<div class="btn-sample levy52_loadmore"><span class="load">' . __('Loading', 'levy52') . '</span><span class="more">' . __('More posts', 'levy52') . '</span></div>';
                ?>
            </div>
            <hr>
            <h2 class="mt-5">Może to Cię zainteresuje?</h2>
            <?php get_template_part('/template-parts/custom-loop'); ?>
        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>

</div>

<?php
get_footer();
