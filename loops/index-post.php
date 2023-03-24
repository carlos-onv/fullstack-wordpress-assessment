<?php
/*
 * The Index Post (or excerpt)
 * ===========================
 * Used by index.php, category.php and author.php
 */
?>
<!-- Create the onClick action here to redirect to the post permanent link -->
<div id="post_<?php the_ID()?>" class="list-group-item list-group-item-action small pt-3">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4">
            <!-- Include the post thumbnail here -->
            <?php if (has_post_thumbnail()) { ?>
            <?php } else { ?>
                <img class="img-fluid rounder" src="<?php echo get_template_directory_uri() . '/theme/img/placeholder.png' ?>" alt="<?php echo get_the_post_thumbnail_caption()?>">
            <?php } ?>
        </div>

        <div class="col-lg-8 col-md-8">
            <div class="my-3 text-muted">
                <i class="bi bi-bookmark"></i>
                <!-- Include the post category inside the span element -->
            </div>

            <h3 class="h1 mb-3 fw-bolder">
                <?php the_title()?>
            </h3>
            <p>
                <!-- Include a if block showing the post excerpt and -->
                <!-- a link to the permalink using a <a> element -->
                <?php if ( has_excerpt( $post->ID ) ) {?>
                <!-- Include a if block showing the post excerpt and -->
                    <!-- a link to the permalink using a <a> element -->
                    <!-- Include an else block showing the post content with -->
                    <!-- the link text as 'Continue reading →' -->
                <?php } else {
                } ?>
            </p>

            <div class="d-flex gap-3 my-3 text-muted">
                <div>
                    <i class="bi bi-calendar3"></i> <?php fsl_post_date(); ?>
                </div>
                <!-- Include the author post link with the translated text in the format: 'By author_link' -->
                <div>
                    <i class="bi bi-person-circle"></i>
                </div>
                <div>
                    <i class="bi bi-chat-text"></i> <a href="<?php comments_link(); ?>"><?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), '', 'fsl' ), number_format_i18n( get_comments_number() ) ); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>