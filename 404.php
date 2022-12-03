<?php
get_header();
?>

<main id="site-content">

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <span class="err404">404</span>
                <?php echo '<h3>' . __('Page not found', 'levy52') . '</h3>'; ?>
                <?php echo '<p>' . __('The page you were looking for could not be found. It may have been deleted, renamed or never existed at all.', 'levy52') . '</p>'; ?>
                <?php echo '<p>' . __('Please try to search for something else', 'levy52') . '</p>'; ?>

                <form role="search" method="get" id="searchform" class="searchform col-md-4 mx-auto mb-5 d-flex"
                    action="<?php bloginfo("url"); ?>">
                    <input class="form-control" type="search" value="" name="s" id="s" placeholder=""
                        aria-label="Search">
                    <button class="btn-sample ms-3" type="submit" id="searchsubmit"
                        value="Search"><?php _e( 'Search', 'levy52' ); ?></button>
                </form>
            </div>
        </div>
</main>

<?php
get_footer();