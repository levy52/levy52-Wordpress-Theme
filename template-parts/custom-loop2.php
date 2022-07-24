<?php
$blog_posts = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'warsztat', 'posts_per_page' => 4));
?>
<div class="row">
<div class="one-time col-12 mt-3">
    <?php if ($blog_posts->have_posts()) : ?>
        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
            <div class="post_article px-1">
                <div class="post_article_content">
                    <h1 class="post_article_title fs-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post_article_img"><a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                        echo the_post_thumbnail('thumbnail', array('class' => 'post-cover'));
                                                    } else {
                                                        echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" width="100%" height="100%" style="
                                                    aspect-ratio: 16/9;"/>';
                                                    } ?>
                    </div>

                    <ul class="post_article_info">
                        <li><?php echo get_the_date(); ?></li>
                        <li><?php
                            $categories = get_the_category();
                            $separator = ' | ';
                            $output = '';
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'levy52'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                }
                                echo trim($output, $separator);
                            } ?> </li>
                    </ul>
                </div>
                <div class="text_post"><?php the_excerpt(); ?></div>
                <p class="para_more"><a href="<?php the_permalink() ?>" class="btn btn-sample"><?php _e('Read more', 'levy52'); ?></a></p>
            </div>
        <?php endwhile; ?>
</div>
</div>
<?php else : ?>
    <?php echo '<h5>' . __('No posts found', 'levy52') . '</h5>'; ?>
<?php endif;
    wp_reset_postdata(); ?>

