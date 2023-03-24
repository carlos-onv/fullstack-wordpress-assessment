<?php
/*
 * Enqueues
 */

if ( ! function_exists('dependencies_enqueues') ) {
	function dependencies_enqueues() {

		// Styles

		wp_register_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', false, '5.2.3', null);
		wp_enqueue_style('bootstrap5');

		wp_register_style('bootstrapIcons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css', false, '1.10.2', null);
		wp_enqueue_style('bootstrapIcons');

		wp_register_style('theme', get_template_directory_uri() . '/style.css', false, '1.0.0');
		wp_enqueue_style('theme');

		// Scripts

		wp_enqueue_script('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), true, true);

        wp_enqueue_script('custom-js', get_template_directory_uri() . '/theme/js/custom.js', array('jquery'), '1.0.0', true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'dependencies_enqueues', 100);
add_theme_support('title-tag');
