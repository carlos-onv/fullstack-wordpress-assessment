<?php
/*
 * All the functions are in the PHP files in the `functions/` folder.
 */

if ( ! defined('ABSPATH') ) {
    exit;
}

require get_template_directory() . '/functions/setup.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/action-hooks.php';
require get_template_directory() . '/functions/navbar.php';
require get_template_directory() . '/functions/widgets.php';
require get_template_directory() . '/functions/index-pagination.php';
