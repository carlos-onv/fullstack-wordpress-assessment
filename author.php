<?php
get_header();
?>

    <main id="site-main">
        <div class="container">
            <h2>
                <?php _e('Post by: ', 'fsl'); ?> <?php echo get_the_author();?>
            </h2>
        </div>
        <?php
        get_template_part('loops/index-loop');
        ?>
    </main>

<?php
get_footer();
?>