<?php
get_header();
?>
<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="post_article_title fs-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post_article_img"><?php echo the_post_thumbnail('full', array('class' => 'post-cover')); ?> </div>
                <div class="text_post"><?php the_content(); ?></div>
                <div class="col-12 mt-5 mb-3 border-bottom border-top">
                    <div class="article-share d-flex justify-content-center">
                        <div class="article-share-bg a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_email"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                    </div>
                    <?php wpb_posts_nav(); ?>
                </div>
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
