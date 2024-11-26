<?php
get_header();
?>

    <main id="site-main">
        <?php
        get_template_part('loops/page-content');
        ?>
    </main>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php if (get_field('image')): ?>
                    <img src="<?php the_field('image'); ?>" alt="">
                <?php endif; ?>
            </div>
            <div class="col-6">
                <?php if (get_field('content')): ?>
                    <?php the_field('content'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php
get_footer();
?>