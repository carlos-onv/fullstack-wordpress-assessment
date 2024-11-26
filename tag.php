<?php
get_header();
?>

    <main id="site-main">
        <div class="container">
            <h2>
                <?php _e('Posts tagged: ', 'fsl'); ?> <?php single_tag_title(); ?>
            </h2>
        </div>
        <?php
        get_template_part('loops/index-loop');
        ?>
    </main>

<?php
get_footer();
?>