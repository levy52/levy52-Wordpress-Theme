<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <div class="post_article col-md-6">
            <div class="post_article_content">
                <h1 class="post_article_title fs-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post_article_img">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            echo the_post_thumbnail('thumbnail',['class' => 'post-cover', 'loading' => false]);
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image.jpg" width="100%" height="100%" style="aspect-ratio: 16/9;"/>';
                        }
                        ?>
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                    </a>
                </div>

                <ul class="post_article_info">
                    <li>
                        <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        $countCategories = count($categories);
                        ?>
                        <?php if (!empty($categories)): ?>
                            <?php if ($countCategories == 1): ?>
                                <span><?php _e('Category', 'levy52'); ?>:</span>
                            <?php elseif ($countCategories > 1): ?>
                                <span><?php _e('Categories', 'levy52'); ?>:</span>
                            <?php endif; ?>
                            <?php
                            foreach ($categories as $category) {
                                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'levy52'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                            }
                            echo trim($output, $separator);
                            ?>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
            <div class="text_post"><?php the_excerpt(); ?></div>
            <p class="para_more"><a href="<?php the_permalink() ?>"
                                    class="btn btn-sample"><?php _e('Read more', 'levy52'); ?></a></p>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <?php echo '<h5>' . __('No posts found', 'levy52') . '</h5>'; ?>
<?php endif; ?>