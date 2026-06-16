<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eLMS
 */

?>
<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="site-info">

                    <p><?php printf( esc_html__( '© %s - eLMS | All rights reserved. ', 'elms' ), esc_html( date( 'Y' ) ) ); ?>
                        <a href="<?php echo esc_url( __( 'mailto:kader.webdev@gmail.com', 'elms' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( ' Designed By %s', 'elms' ), 'Kader' );
							?>
                        </a>
                    </p>
                </div><!-- .site-info -->
            </div>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
