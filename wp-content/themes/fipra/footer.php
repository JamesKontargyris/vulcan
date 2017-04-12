<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fipradotcom
 */
?>

    </div> <!-- #content-->

    <div id="footer-container" class="custom-bg--primary custom-text--primary-contrast-subtle">
        <footer id="colophon" class="site-footer" role="contentinfo">

            <div class="footer-section custom-text--primary-contrast-subtle">
                <?php dynamic_sidebar('footer-left'); ?>
            </div>
            <div class="footer-section custom-text--primary-contrast-subtle">
                <?php dynamic_sidebar('footer-middle'); ?>
            </div>
            <div class="footer-section custom-text--primary-contrast-subtle">
                <?php dynamic_sidebar('footer-right'); ?>
            </div>

        </footer><!-- #colophon -->

    </div>
    <div id="site-info-container" class="custom-bg--primary">
        <div class="site-info">

            <div class="site-info-section custom-text--primary-contrast-subtle">
                <?php dynamic_sidebar('site-info'); ?>
                <?php wp_nav_menu(array('theme_location' => 'legal', 'depth' => '1')); ?>
            </div>

        </div><!-- .site-info -->
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
