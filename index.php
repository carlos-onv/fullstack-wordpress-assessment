<?php get_header(); ?>
<main id="page-container">
    <ul>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</main>
<?php get_footer(); ?>