
        <div class="col-12 col-md-4 col-xxl-2">
            <ul class="sticky-top">
                <?php if (is_active_sidebar('sidebar')) : ?>
                    <?php dynamic_sidebar('sidebar'); ?>
                <?php endif; ?>
                <li style="list-style: none">
                    <h2>About the theme</h2>
                    <p>A template made from scratch with Bootstrap.</p>
                </li>
                <li>
                    <h2> Archiwum wpisow </h2>
                    <ul>
                        <?php wp_get_archives('title_li='); ?>
                    </ul>
                </li>
                <li>
                    <h2> Kategorie </h2>
                    <ul>
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </li>
                <li>
                    <h2> Linki </h2>
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </li>
            </ul>
        
        </div>