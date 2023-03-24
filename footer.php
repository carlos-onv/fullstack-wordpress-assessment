
<footer id="site-footer" class="bg-light border-top border-bottom">

    <div class="container-xxl">

        <?php if(is_active_sidebar('footer-widget-area')): ?>
            <div class="row pt-5 pb-4" id="footer" role="navigation">
                <?php dynamic_sidebar('footer-widget-area'); ?>
            </div>
        <?php endif; ?>

    </div>

</footer>

<?php fsl_bottomline();?>

<?php wp_footer(); ?>
</body>
</html>