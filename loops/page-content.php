<?php
/*
 * The Page Content Loop
 */
?>

<!-- Create the default Page content -->
<!-- You have to show the Page's title, content, and -->
<!-- create a Field Group using ACF and add at least two Fields to show in this template -->
<!-- You have to use Bootstrap to define those new fields style -->

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class("mb-5")?>>
        <header class="container py-5 text-center">
            <h1 class="display-2 my-5">
                <?php the_title()?>
            </h1>
        </header>

        <section class="wrap-md pb-5">
            <?php the_content()?>
            <?php wp_link_pages(); ?>
        </section>

        <section class="section-three py-4 border-top">
            <!-- Show your content with the ACF fields here -->
        </section>
    </article>
<?php
  endwhile;
  else :
    get_template_part('loops/404');
  endif;
?>
