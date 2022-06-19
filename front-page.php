<?php
get_header();
?>

<div class="container-fluid">
    <?php
    echo do_shortcode('[smartslider3 slider="2"]');
    ?>
</div>

<div class="container mt-2 mb-4 mt-5 text-color">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php get_template_part('/template-parts/custom-loop'); ?>
            <?php get_template_part('/template-parts/custom-loop2'); ?>
        </div><?php get_sidebar('sidebar'); ?>
    </div>

</div>
</div>

<?php
get_footer();
