<?php
$blog_posts = new WP_Query(array('post_type' => 'post', 'post_status’' => 'publish', 'posts_per_page' => 6, 'tag' => 'home-slider'));
?>

<?php if ($blog_posts->have_posts()) : ?>
    <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
        <div class="post_article home-slider-post-article">
            <div class="post_article_content">
                <div class="home-slider-post_article_img post_article_img"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                                                                                    echo the_post_thumbnail('thumbnail', ['class' => 'post-cover', 'loading' => false]);
                                                                                                                } else {
                                                                                                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" width="100%" height="100%" style="
                                                    aspect-ratio: 16/9;"/>';
                                                                                                                } ?>
                        <span class="home-slider-post-date post-date">
                            <?php echo get_the_date(); ?><br>
                            <?php the_title(); ?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
<?php endif;
wp_reset_postdata(); ?>