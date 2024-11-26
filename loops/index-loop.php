<?php
/*
 * The Default Loop (used by index.php, category.php, tag.php, archive.php and author.php)
 * =================================================================
 * If you require only post excerpts to be shown in index and category pages, 
 * use the [---more---] block within blog posts.
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <div class="list-group py-5">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <?php get_template_part('loops/index-post', get_post_format()); ?>
                <?php endwhile; ?>

                    <?php bootstrap_pagination(); ?>

                <?php
                else :
                    get_template_part('loops/404');
                endif;
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 pt-5" id="mainbody-widget-area-1">
            <!-- check and show the widget named 'mainbody-widget-area-1' -->
             <?php if(is_active_sidebar('mainbody-widget-area-1')) :?>
                <div class="row pt-5 pb-4">
                    <?php dynamic_sidebar('mainbody-widget-area-1'); ?>
                </div>
                
            <?php endif; ?>
        </div>
    </div>
</div>

