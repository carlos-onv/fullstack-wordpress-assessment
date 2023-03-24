<?php
/**
 * The Template for displaying all single posts
 *
 * @package 	WordPress
 * @subpackage 	Bootstrap 5.2.3
 * @autor 		FullStack Labs Team
 */
get_header();
?>

<main id="site-main">
    <?php get_template_part('loops/single-post', get_post_format()); ?>
</main>

<?php
get_footer();
?>
