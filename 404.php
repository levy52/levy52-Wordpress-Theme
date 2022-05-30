<?php
get_header();
?>

<main id="site-content">

    <div class="container">
        <div class="row">
            <h1 class="col-12 text-center">Strona nie została znaleziona...</h1>
            <div class="col-12 text-center mt-4 mb-4">
                <p>Nie można znaleźć strony, której szukano. Być może została usunięta, zmieniono jej nazwę lub w ogóle nigdy nie istniała.</p>
            </div>
            <div class="col-10 mt-5 text-center">
                <p>Spróbuj wyszukać coś innego</p>
                <?php
                get_search_form(
                    array(
                        'aria_label' => __('404 not found', 'twentytwenty'),
                    )
                );
                ?>
            </div>
            <div class="col-2 img-fluid">
                <img src="<?php echo get_template_directory_uri(); ?> /assets/images/stop.jpg" class="img-fluid" alt=""/>
            </div>
        </div>
    </div><!-- .section-inner -->

</main><!-- #site-content -->

<?php
get_footer();
