<?php
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="post_article_title fs-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post_article_img"><?php echo the_post_thumbnail('thumbnail', array('class' => 'post-cover')); ?> </div>
                <div class="text_post"><?php the_content(); ?></div>
            <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            ?>
        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>
</div>

<?php
get_footer();
