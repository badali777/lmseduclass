<?php
/**
 * The template for displaying all single posts
 *
 * @package Elementic
 */

get_header();
?>
<div id="content" class="site-content">
	<main id="primary" class="site-main">
	<?php
	// Banner section.
	if ( have_posts() ) {
		while ( have_posts() ) :
			the_post();
			?>
			<div class="page-banner-wrapper">
				<div class="page-banner">
					<?php
					$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
					$default_image  = get_template_directory_uri() . '/assets/images/default-page-banner.svg';

					$banner_image = $featured_image ? $featured_image : $default_image;
					?>
					<div class="page-banner-image" style="background-image: url('<?php echo esc_url( $banner_image ); ?>');">
						<div class="page-banner-overlay"></div>
						<div class="page-banner-content">
							<h1 class="page-banner-title"><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			</div>
			<?php
		endwhile;
		rewind_posts();
	}
	?>
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'elementic' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'elementic' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div><!-- .container -->
	</main><!-- #primary -->

	<?php get_sidebar(); ?>
</div><!-- #content -->

<?php
get_footer();