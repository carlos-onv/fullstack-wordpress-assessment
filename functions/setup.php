<?php
/*
 * Setup
 */

if ( ! function_exists( 'fsl_avatar_attributes' ) ) {
    function fsl_avatar_attributes($avatar_attributes) {
        $display_name = get_the_author_meta( 'display_name' );
        $avatar_attributes = str_replace('alt=\'\'', 'alt=\'Avatar for '.$display_name.'\' title=\'Gravatar for '.$display_name.'\'',$avatar_attributes);
        return $avatar_attributes;
    }
}
add_filter('get_avatar','fsl_avatar_attributes');

if ( ! function_exists( 'fsl_author_avatar' ) ) {
    function fsl_author_avatar() {

        echo get_avatar(get_the_author_meta('user_email'), $size = '40');    }
}

if ( ! function_exists( 'fsl_author_bio_avatar' ) ) {
    function fsl_author_bio_avatar() {

        echo get_avatar(get_the_author_meta('user_email'), $size = '96');
    }
}

if ( ! function_exists( 'fsl_author_description' ) ) {
    function fsl_author_description() {
        echo get_the_author_meta('user_description');
    }
}

if ( ! function_exists( 'fsl_post_date' ) ) {
    function fsl_post_date() {
        if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">(updated %4$s)</time>';
            }

            $time_string = sprintf( $time_string,
                esc_attr( get_the_date( 'c' ) ),
                get_the_date(),
                esc_attr( get_the_modified_date( 'c' ) ),
                get_the_modified_date()
            );

            echo $time_string;
        }
    }
}
