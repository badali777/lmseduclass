<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="container">
            <div class="row">

				<?php $has_sidebar = is_active_sidebar( 'sidebar-1' ); ?>

                <!-- Content Column -->
                <div class="col-lg-<?php echo $has_sidebar ? '8' : '12'; ?> col-sm-12">

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'elms' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'elms' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
					?>

                </div>

                <!-- Sidebar Column -->
				<?php if ( $has_sidebar ) : ?>
                    <div class="col-lg-4 col-sm-12">
						<?php get_sidebar(); ?>
                    </div>
				<?php endif; ?>

            </div>
        </div>
    </main>

<?php
get_footer();
?>