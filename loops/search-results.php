<?php
/*
 * The Search Results (Main Header and) Loop
 */
get_header();
?>
<!-- Create the Search result template to show the results of a search -->
<!-- You have to show the posts using the 'loops/index-loop' -->
<!-- If not posts exist, you have to show a HTML element with the message 'Sorry, your search yielded no results.'-->
<!-- You must use bootstrap 5 and, if necessary, custom css styles from the style.css file -->
<main id="site-main">
        <?php
        global $query_string;
        $search = new WP_Query($query_string);
        echo '<h1>Search Results for '.get_search_query().'</h1>';
        if ($search->have_posts()):
          global $wp_query;
          $wp_query = $search;
          get_template_part('loops/index-loop');
          wp_reset_postdata();
        else :
         esc_html_e('Sorry, your search yielded no results.'); 
         endif

        ?>
    </main>

<?php
get_footer();
?>