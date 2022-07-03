<div class="col col-md-4 col-xxl-3 sidebar-style mt-4">
    <ul class="sticky-md-top">
        <li>
            <div class="sidebar-border mb-2"><?php _e('Categories', 'levy52'); ?></div>
            <ul>
                <?php wp_list_categories('title_li='); ?>
            </ul>
        </li>

        <div class="sidebar-border mt-3 mb-3"><?php _e('Latest Comments', 'levy52'); ?></div>
        <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>

        <div class="sidebar-border mt-3 mb-2"><?php _e('Newsletter', 'levy52'); ?></div>
        <?php
        echo do_shortcode('[mc4wp_form id="427"]');
        ?>

    </ul>
</div>