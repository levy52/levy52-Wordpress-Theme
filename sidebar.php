
        <div class="col col-md-4 col-xxl-2 sidebar-style mt-4">
            <ul class="sticky-md-top">
                <?php if (is_active_sidebar('sidebar')) : ?>
                    <?php dynamic_sidebar('sidebar'); ?>
                <?php endif; ?>
                <li>
                    <div class="sidebar-border mb-2">Info</div>
                    <p>A template made from scratch with Bootstrap.</p>
                </li>
                <li>
                    <div class="sidebar-border mb-2"> Categories </div>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>
            </ul>
        
        </div>