<!-- Footer -->
<footer class="text-center text-lg-start bg-black">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-md-between p-4 border-bottom">
    <div class="me-5 d-none d-sm-block">
    <div class="socialmedia">Get connected with us on social networks:<?php dynamic_sidebar("socialmedia"); ?></div>
    </div>
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-2">
            Category
          </h6>
          <nav class="container navbar navbar-dark bg-black text-secondary navbar-text d-flex justify-content-center justify-content-md-start m-0">
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
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-2">
            Menu
          </h6>

          <nav class="container navbar navbar-dark bg-black text-secondary navbar-text d-flex justify-content-center justify-content-md-start m-0">
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
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-3">
            Contact
          </h6>
          <p>New York, NY 10012, US</p>
          <p>info@example.com</p>
          <p>+ 01 234 567 88</p>
          <p>+ 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
 
  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://github.com/levy52">levy52 Theme</a>
  </div>
  <!-- Copyright -->
  

</footer>
<!-- Footer -->
<a href="#" class="topbutton"></a>
<?php wp_footer(); ?>
</body>

</html>