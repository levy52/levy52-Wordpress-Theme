<?php if (!is_front_page()) : ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
        if (function_exists('yoast_breadcrumb')) {
          yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
        </div>
    </div>
</div>
<?php endif; ?>

<footer class="text-center text-lg-start rich-black">

    <div class="d-flex justify-content-center justify-content-md-between p-4 border-bottom">
        <div class="container socialmedia"><?php dynamic_sidebar("socialmedia"); ?></div>
    </div>

    <div class="rich-black">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fs-3 fw-bold mb-4 text-secondary"></h6>
                        <div class="logo">
                            <?php the_custom_logo(); ?>
                        </div>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fs-3 fw-bold mb-2 text-secondary">
                        <?php _e('Category', 'levy52'); ?>
                    </h6>
                    <nav
                        class="container navbar navbar-dark d-flex justify-content-center justify-content-md-start m-0 rich-black">
                        <?php
            wp_nav_menu(array(
              'theme_location'    => 'footer_category',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'list-unstyled lh-lg',
              'menu_class'        => 'nav navbar-nav',
              'items_wrap'        => '<li id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</li>',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => 'WP_Bootstrap_Navwalker',
            ));
            ?>

                    </nav>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fs-3 fw-bold mb-2 text-secondary">
                        <?php _e('Menu', 'levy52'); ?>
                    </h6>

                    <nav
                        class="container navbar navbar-dark d-flex justify-content-center justify-content-md-start m-0 rich-black">
                        <?php
            wp_nav_menu(array(
              'theme_location'    => 'footer',
              'depth'             => 2,
              'container'         => 'div',
              'container_class'   => 'list-unstyled lh-lg',
              'menu_class'        => 'nav navbar-nav',
              'items_wrap'        => '<li id="%1$s" class="navbar-nav ms-auto %2$s">%3$s</li>',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => 'WP_Bootstrap_Navwalker',
            ));
            ?>

                    </nav>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fs-3 fw-bold mb-3 text-secondary">
                        <?php _e('Contact', 'levy52'); ?>
                    </h6>
                    <?php dynamic_sidebar("contact"); ?>
                </div>
            </div>
        </div>
        </div>


    <div class="text-center p-4">
        Radoslawny.pl © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://github.com/levy52">levy52 Theme</a>
    </div>

</footer>

<a href="#" class="topbutton"></a>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
<script>
! function(e) {
    "function" == typeof define && define.amd ? define(e) : e()
}(function() {
    var e, t = ["scroll", "wheel", "touchstart", "touchmove", "touchenter", "touchend", "touchleave", "mouseout",
        "mouseleave", "mouseup", "mousedown", "mousemove", "mouseenter", "mousewheel", "mouseover"
    ];
    if (function() {
            var e = !1;
            try {
                var t = Object.defineProperty({}, "passive", {
                    get: function() {
                        e = !0
                    }
                });
                window.addEventListener("test", null, t), window.removeEventListener("test", null, t)
            } catch (e) {}
            return e
        }()) {
        var n = EventTarget.prototype.addEventListener;
        e = n, EventTarget.prototype.addEventListener = function(n, o, r) {
            var i, s = "object" == typeof r && null !== r,
                u = s ? r.capture : r;
            (r = s ? function(e) {
                var t = Object.getOwnPropertyDescriptor(e, "passive");
                return t && !0 !== t.writable && void 0 === t.set ? Object.assign({}, e) : e
            }(r) : {}).passive = void 0 !== (i = r.passive) ? i : -1 !== t.indexOf(n) && !0, r.capture =
                void 0 !== u && u, e.call(this, n, o, r)
        }, EventTarget.prototype.addEventListener._original = e
    }
});
</script>

</body>

</html>