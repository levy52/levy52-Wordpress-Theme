<?php
get_header();
?>
<div class="container-fluid">
<div class="row">
    <div class="col-12 col-md-8 col-xxl-10">

            <div class="text_post"><?php the_content(); ?></div>
            

        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>
</div>

<?php
get_footer();
