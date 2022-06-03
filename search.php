<meta name="robots" content="noindex">

<?php
get_header();
?>
<div class="container">
<div class="row">
    <div class="col-12 col-md-8 col-xxl-10">

    <?php 
global $post;
$args = array( 's' => esc_html( get_search_query( false ) ), 'posts_per_page' => 32 );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="col-md-12">
        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
       </div>
<?php endforeach;
 wp_reset_postdata();?>
            

        </div>
        <?php get_sidebar('sidebar'); ?>
    </div>
</div>

<?php
get_footer();
