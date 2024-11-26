<?php
get_header();
?>

    <main id="site-main">
        <div class="container">
            <h2>
                Category: <?php single_cat_title(); ?>
            </h2>
        </div>
        
        <?php
        get_template_part('loops/index-loop');
        ?>
    </main>

<?php
get_footer();
?>