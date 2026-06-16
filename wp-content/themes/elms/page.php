<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 */

get_header();
?>
	<main id="primary" class="site-main">
        <div class="container">
            <div class="row">

				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

                    <!-- Content with sidebar -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;
						?>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
						<?php get_sidebar(); ?>
                    </div>

				<?php else : ?>

                    <!-- Full width content -->
                    <div class="col-12">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile;
						?>
                    </div>

				<?php endif; ?>

            </div>
        </div>

	</main><!-- #main -->

<?php

get_footer();
