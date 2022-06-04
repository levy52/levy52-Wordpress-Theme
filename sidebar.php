
        <div class="col col-md-4 col-xxl-2 sidebar-style mt-4">
            <ul class="sticky-md-top">
                <?php if (is_active_sidebar('sidebar')) : ?>
                    <?php dynamic_sidebar('sidebar'); ?>
                <?php endif; ?>
                <li>
                    <div class="sidebar-border mb-2"><?php _e( 'Info', 'levy52' ); ?></div>
                    <?php echo '<p>' . __('A template made from scratch with Bootstrap.', 'levy52') . '</p>'; ?>
                </li>
                <li>
                    <div class="sidebar-border mb-2"><?php _e( 'Categories', 'levy52' ); ?></div>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>
            </ul>
        
        </div>