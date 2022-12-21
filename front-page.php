<?php
get_header();
?>

<div class="home-slider container-fluid">
<?php get_template_part('/template-parts/home-slider-loop'); ?>
</div>

<div class="container mb-4  text-color">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php get_template_part('/template-parts/custom-loop'); ?>
            <h2 class="mt-5">Zapoznaj się z..</h2>
            <?php get_template_part('/template-parts/custom-loop2'); ?>
        </div><?php get_sidebar('sidebar'); ?>
    </div>
</div>
</div>

<?php
get_footer();