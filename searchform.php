<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 */

$unique_id = wp_unique_id( 'search-form-' );
$aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<form class="d-flex"
      role="search"
    <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
      method="get"
      action="<?php echo home_url( '/' ); ?>"
>
    <div class="input-group">
        <!-- Create the search input using bootstrap to call the search Wordpress query -->
    </div>
</form>