<?php
get_header();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>
</div>

<?php
get_footer();
