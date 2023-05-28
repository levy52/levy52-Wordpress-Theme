<?php
$blog_posts = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'garaz,golf-3,golf-iv,passat-b5,corsa-d', 'posts_per_page' => 8));
?>
<div class="row">
    <div class="one-time col-12 mt-3">
        <?php if ($blog_posts->have_posts()) : ?>
        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
        <div class="post_article px-1">
            <div class="post_article_content">
                <div class="post_article_img mb-1"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                        echo the_post_thumbnail('thumbnail', ['class' => 'post-cover']);
                                                    } else {
                                                        echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" width="100%" height="100%" style="
                                                    aspect-ratio: 16/9;"/>';
                                                    } ?> </a>
                </div>
                <div class="text_post"><?php the_excerpt(); ?></div>
                <p class="para_more"><a href="<?php the_permalink() ?>"
                        class="btn-sample"><?php _e('Read more', 'levy52'); ?></a></p>
            </div>

        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php else : ?>
<?php echo '<h5>' . __('No posts found', 'levy52') . '</h5>'; ?>
<?php endif;
    wp_reset_postdata(); ?>