<?php
/*
 * The Single Post
 */
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article role="article" id="post_<?php the_ID()?>">
    <header class="wrap-lg my-5">
      <div class="mb-5 text-center text-muted">
        <i class="bi bi-bookmark"></i> 
        <span class="text-uppercase"><!-- Get the post category, separated by comma --></span>
      </div>

      <h1 class="display-1 text-center fw-bolder"><?php the_title()?></h1>

      <div class="d-flex justify-content-center align-items-center my-5 text-muted">
        
        <div class="pe-3 d-flex align-items-center">
          <div class="me-1 border rounded-circle overflow-hidden">
            <?php fsl_author_avatar(); ?>
          </div>
          <?php _e('By', 'fsl'); echo '&nbsp;'; the_author_posts_link(); ?>
        </div>

        <div class="pe-3">
          <i class="bi bi-calendar3"></i>
          <?php fsl_post_date(); ?>
        </div>

        <div>
          <i class="bi bi-chat-text"></i>
          <a href="#post-comments"><?php
            $comment_count = get_comments_number();
            printf(
              esc_html( _nx( '%1$s comment', '%1$s comments', $comment_count, 'fsl' ) ),
              number_format_i18n( $comment_count )
            );
          ?></a>
        </div>
      </div>
    </header>

    <?php wp_link_pages(); ?>

    <section class="wrap-md my-5 long-read">
      <?php the_content(); ?>
    </section>

    <?php wp_link_pages(); ?>
  </article>

  <?php if (has_tag()) { ?>
        <!--include an area to show all tags from a post, separated by comma -->
    <div class="wrap-md my-5 text-muted">
      <i class="bi bi-tag"></i>
    </div>
  <?php  }; ?>

  <section class="wrap-md d-flex border-top border-bottom py-5">
    <div class="border rounded-circle overflow-hidden">
      <?php fsl_author_bio_avatar(); ?>
    </div>
    <div class="ms-3">
      <p class="h4"><?php _e('Author: ', 'fsl'); the_author(); ?></p>
      <?php if (fsl_author_description()) {
        ?>
        <div class="author-description"><?php fsl_author_description(); ?></div>
        <?php
      } ?>
      <p class="mb-0"><?php _e('Other posts by ', 'fsl'); the_author_posts_link(); ?></p>
    </div>
  </section><!-- /.author-bio -->

  <?php
    if ( comments_open() || get_comments_number() ) :

    comments_template('/loops/single-post-comments.php');

    endif;
  ?>

  <section class="container-xxl my-5">
    <div class="row g-2">
      <?php if (strlen(get_previous_post()->post_title ?? '') > 0) { ?>
      <div class="col-sm">
        <div class="border rounded bg-light d-flex align-items-center">
          <i class="bi bi-chevron-compact-left fs-1"></i>
          <div>
            Previous post<br>
            <?php previous_post_link( '%link', '%title' ) ?>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if (strlen(get_next_post()->post_title ?? '') > 0) { ?>
        <div class="col-sm">
          <div class="border rounded bg-light d-flex flex-row-reverse align-items-center">
          <i class="bi bi-chevron-compact-right fs-1"></i>
          <div class="text-end">
            Next Post<br>
            <?php next_post_link( '%link', '%title' ) ?>
          </div>
        </div>
      </div>
      <?php } ?>

      <!-- `<div class="col text-start">
        <?php previous_post_link('%link', '<i class="bi bi-arrow-left"></i> Previous post: '.'%title'); ?>
      </div>
      <div class="col text-end">
        <?php next_post_link('%link', 'Next post: '.'%title'.' <i class="bi bi-arrow-right"></i>'); ?>
      </div> -->
    </div>
  </section>

  <?php
  endwhile; else :
    get_template_part('loops/404');
  endif;
?>


