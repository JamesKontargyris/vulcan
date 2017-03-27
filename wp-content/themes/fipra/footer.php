<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fipradotcom
 */
?>

<!--If page type is an expertise area, don't show the page testimonials (they are displayed on single-expertise.php-->
    <?= get_post_type() != 'expertise' ? do_shortcode('[page_testimonials]') : ''; ?>

    </div> <!-- #content-->

    <div id="footer-global-network-container">
        <div id="footer-global-network">
            <label for="footer-global-network">Global&nbsp;Network&nbsp;Countries:</label>
            <div class="select-wrapper">
                <select name="footer-global-network" id="footer-global-network">
                    <option value="">Please select country...</option>
                    <option value="/network/fipra-international">Fipra International</option>

                    <?php
                    $continents = get_terms('continent', 'hide_empty=0');
                    foreach( $continents as $continent ) :
                        ?>
                        <optgroup label="<?= $continent->name ?>">

                            <?php $continent_units = get_units_by_continent($continent->term_id); ?>
                            <?php while ( $continent_units->have_posts() ) : $continent_units->the_post(); ?>
                                <option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
                            <?php endwhile; ?>

                        </optgroup>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div id="footer-container">
        <footer id="colophon" class="site-footer" role="contentinfo">

            <div class="footer-section">
                <?php dynamic_sidebar('footer-left'); ?>
            </div>
            <div class="footer-section">
                <?php dynamic_sidebar('footer-middle'); ?>
            </div>
            <div class="footer-section">
                <?php dynamic_sidebar('footer-right'); ?>
            </div>

        </footer><!-- #colophon -->

    </div>
    <div id="site-info-container">
        <div class="site-info">

            <div class="site-info-section">
                <?php dynamic_sidebar('site-info-left'); ?>
                <?php wp_nav_menu(array('theme_location' => 'legal', 'depth' => '1')); ?>
            </div>
            <div class="site-info-section">
                <?php dynamic_sidebar('site-info-right'); ?>
            </div>

        </div><!-- .site-info -->
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
