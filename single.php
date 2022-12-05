<?php
get_header();
?>
<div class="container mb-4 mt-5">
    <div class="row">
        <div class="col-12 col-md-8 col-xxl-9">
            <?php while (have_posts()) : the_post(); ?>
            <span class="header-post">
                <span class="single-date-post"><?php echo get_the_date(); ?></span>
                <span><?php $categories = get_the_category();
                            $separator = ' / ';
                            $output = '';
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
                                }
                                echo trim($output, $separator);
                            } ?></span>
                <span class="single-post-comments"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        style="fill: rgba(146, 94, 247, 1);">
                        <path
                            d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h1zM4 8h12v8h-5.277L7 18.234V16H4V8z">
                        </path>
                        <path
                            d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2z">
                        </path>
                    </svg>
                    <a href="#comments"><?php echo get_comments_number(); ?></a></span>
            </span>

            <h1 class="post_article_title mt-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="post_article_img"><?php echo the_post_thumbnail('full', array('class' => 'post-cover')); ?>
            </div>
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