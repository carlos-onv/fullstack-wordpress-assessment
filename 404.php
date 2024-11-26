<?php
get_header();
?>

    <main id="site-main">
        <div class="container">
        <h1> <?php _e('Oops! That page cannot be found', 'fsl'); ?></h1>
        <div class="row">
            <div class="col">
                <h3><?php _e('It looks like nothing was found. Try to search something else', 'fsl'); ?></h3>
                <?php 
                get_search_form();
                ?>
            </div>
        </div>
        </div>
        
    </main>

<?php
get_footer();
?>