<?php
/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


// Navbar (in `header.php`)

function navbar_brand() {
    if ( ! has_action('navbar_brand') ) {
        ?>
        <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo('name'); ?></a>
        <?php
    } else {
        do_action('navbar_brand');
    }
}

// Footer (in `footer.php`)

function fsl_bottomline() {
    if ( ! has_action('bottomline') ) {
        ?>
        <div class="container-xxl">
            <div class="row pt-3">
                <div class="col-sm">
                    <p class="text-center text-sm-start">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
                </div>
                <div class="col-sm">
                    <p class="text-center text-sm-end"><a href="https://www.fullstacklabs.co/">FSL</a> theme for WordPress</p>
                </div>
            </div>
        </div>
        <?php
    } else {
        do_action('bottomline');
    }
}