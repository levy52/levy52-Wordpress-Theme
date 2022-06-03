<?php
get_header();
?>

<main id="site-content">

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <span class="err404">404</span>
                <h1>Strona nie została znaleziona...</h1>
                <p>Nie można znaleźć strony, której szukano. Być może została usunięta, zmieniono jej nazwę lub w ogóle nigdy nie istniała.</p>
                <p>Spróbuj wyszukać coś innego</p>
                
                <form role="search" method="get" id="searchform" class="searchform col-md-4 mx-auto mb-5 d-flex" action="<?php bloginfo("url"); ?>">
                    <input class="form-control" type="search" value="" name="s" id="s" placeholder="" aria-label="Search">
                    <button class="btn btn-danger ms-3" type="submit" id="searchsubmit" value="Search">Search</button>
                </form>
            </div>
        </div>
</main>

<?php
get_footer();
