<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <div class="post_article col-md-6">
            <div class="post_article_content">
                <h1 class="post_article_title fs-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="post_article_img"><?php if (has_post_thumbnail()) {
                                                    echo the_post_thumbnail('thumbnail', array('class' => 'post-cover'));
                                                } else {
                                                    echo '<img src="https://crocoder.pl/wp-content/uploads/2018/12/wordpress-personalizacja-motywu-logo-1.jpg" width="100%" height="100%" object-fit="ratio" aspect-ratio="16/9"/>';
                                                } ?>
                </div>

                <ul class="post_article_info">
                    <li>Dodano: <?php the_date(); ?></li>
                    <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))) ?>"><?php echo the_author_meta('display_name'); ?></a></li>
                    <li><?php comments_popup_link('Brak komentarzy', '1 komentarz', '% Comments'); ?></li>
                </ul>
            </div>
            <div class="text_post"><?php the_excerpt(); ?></div>
            <p class="para_more"><a href="<?php the_permalink() ?>" class="btn btn-success">Read more</a></p>
        </div>
    <?php endwhile; ?>

<?php else : ?>
    <h5> Nie znaleziono żadnych postów</h5>
<?php endif; ?>