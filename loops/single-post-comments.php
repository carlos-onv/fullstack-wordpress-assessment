<?php
/*
 * Custom Feedback
 * ===============
 * https://codex.wordpress.org/Function_Reference/wp_list_comments#Comments_Only_With_A_Custom_Comment_Display
*/

function fsl_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);
  if ( 'div' == $args['style'] ) {
      $tag = 'div';
      $add_below = 'comment';
  } else {
      $tag = 'li';
      $add_below = 'div-comment';
  }
?>

<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
  <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>

  <div class="d-flex">
    <div class="pe-3">
      <?php echo get_avatar( $comment->comment_author_email, $size = '52'); ?>
    </div>
    <div>
      <h4 class="m-0"><?php comment_author(); ?></h4>
      <p class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf('%1$s ' . __('at', 'fsl') . ' %2$s', get_comment_date(), get_comment_time()) ?></a></p>
      <?php if ($comment->comment_approved == '0') : ?>
        <p><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'fsl') ?></em></p>
      <?php endif; ?>
    </div>
  </div>

  <div>
    <?php comment_text() ?>
  </div>

  <div class="reply">
    <p class="d-flex align-items-center gap-3">
      <?php comment_reply_link( array_merge( $args, array(
        'add_below' => $add_below,
        'reply_text' => __('<i class="bi bi-reply"></i> Reply', 'textdomain'),
        'depth' => $depth,
        'max_depth' => $args['max_depth']
        ))
      ); ?>
      <?php edit_comment_link('<span class="btn btn-secondary">' . __('<i class="bi bi-pen"></i> Edit this reply', 'fsl') . '</span>',' ','' ); ?>
    </p>
  </div>

<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; }

/**!
 * Custom Comments Form
 */

// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
  <section id="post-comments">
    <div class="comments-wrap wrap-md">
      <div class="alert alert-warning">
        <?php _e('This post is password protected. Enter the password to view comments.', 'fsl'); ?>
      </div>
    </div>
  </section>
<?php
  return;
} // End do not delete section

if (have_comments()) : ?>

  <section id="post-comments">
    <div class="wrap-md">
      <h3 class="mt-5 mb-3">
        <?php printf(
          /* translators: 1: title. */
          esc_html__( 'Feedback', 'fsl' ),
          '<span>' . get_the_title() . '</span>'
        );?>
      </h3>

      <p><i class="bi bi-chat-text"></i> <?php
          // Create a logic to show the Post comments
          // checking if the post has one comment, it has to have the format
          // number_of_comments comment on post_title
          // Otherwise, if it has more than one comment, it has to have the format
          // number_of_comments comments on post_title
          $comment_count = get_comments_number();
        ?>
      </p>

      <ol class="comment-list">
          <!-- Show the list of comments passing as args 'type=comment&callback=fsl_comment' -->
      </ol><!-- /.comment-list -->

      <p class="text-muted">
        <?php paginate_comments_links(); ?>
      </p>
    </div>
  </section>  
<?php
  else :
  if (comments_open()) :
      // Create a solution to show a HTML element with the bootstrap class alert to show 'Be the first to write a comment.'
      // If the current post is still open for comments, Otherwise you must show the message 'Comments are closed for this post.'
		else :
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond" class="wrap-md py-3">
  <div class="bg-light border px-3 py-1">
    <div>
        <h3 class="mt-3"><?php comment_form_title(__('Leave a Reply', 'fsl'), __('Responses to %s', 'fsl')); ?></h3>
        <p>Required fields are marked <span class="fs-4">*</span></p>
        <p><?php cancel_comment_reply_link(); ?></p>
        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
        <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'fsl'), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>

        <form action="<?php echo site_url('/wp-comments-post.php') ?>" method="post" id="commentform">

          <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as', 'fsl') . ' <a href="%s/wp-admin/profile.php">%s</a>.', get_option('url'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'fsl'); ?>"><?php echo __('Log out', 'fsl') . ' <i class="bi bi-arrow-right"></i>'; ?></a>
          </p>
          <?php else : ?>

          <div class="form-group">
            <label for="author" class="mb-2">
              <?php _e('Your name', 'fsl'); if ($req) echo '*'; ?>
            </label>
            <input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>

          <div class="form-group">
            <label for="email" class="my-2">
              <?php _e('Your email address', 'fsl'); if ($req) echo '*'; echo '<span class="text-muted">' . __('(will not be published)', 'fsl') . '</span>'; ?>
            </label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>

          <div class="form-group">
            <label for="url" class="my-2">
              <?php echo __('Your website or blog', 'fsl') . '<span class="text-muted">' . __(' (not required)', 'fsl') . '</span>'; ?>
            </label>
            <input type="url" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>">
          </div>

          <?php endif; ?>

          <div class="form-group">
            <label for="comment" class="my-2"><?php _e('Your comment:', 'fsl'); ?></label>
            <textarea name="comment" class="form-control mt-1 mb-3" id="comment" rows="8" aria-required="true"></textarea>
          </div>

          <p><input name="submit" class="btn btn-primary" type="submit" id="submit" value="<?php _e('Post comment', 'fsl'); ?>"></p>

          <?php comment_id_fields(); ?>
          <?php do_action('comment_form', $post->ID); ?>
        </form>
        <?php endif; ?>

    </div>
  </div>
</section>
<?php endif; ?>
