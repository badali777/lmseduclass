<?php
/**
 * The main template file
 *
 * @package Elementic
 */

get_header();
?>

	<div class="blog-two-column">

		<main id="primary" class="site-main">

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header class="page-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				?>
				<div class="posts-container el-blog-loop">
				<?php
				/* Start the Loop. */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
				</div><!-- .posts-container -->
				<?php

				// Numeric Pagination.
				if ( function_exists( 'elementic_numeric_pagination' ) ) {
					elementic_numeric_pagination();
				} else {
					the_posts_pagination( array( 'mid_size' => 2 ) );
				}

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #primary -->

		<aside id="secondary" class="right-sidebar">
			<section class="widget el-categories-widget">
				<div class="widget-title-wrapper">
					<h2 class="widget-title"><?php echo esc_html__( 'Categories', 'elementic' ); ?></h2>
					<a href="<?php echo esc_url( home_url( '/categories/' ) ); ?>" class="view-all-link"><?php esc_html_e( 'View all', 'elementic' ); ?></a>
				</div>
				<?php
				// Get top 15 non-empty categories ordered by count.
				$categories = get_categories(
					array(
						'orderby'    => 'count',
						'order'      => 'DESC',
						'hide_empty' => true,
						'number'     => 15,
					)
				);
				?>
				<ul class="category-list">
					<?php foreach ( $categories as $category ) : ?>
						<li class="category-item">
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
							<span class="count">(<?php echo esc_html( $category->count ); ?>)</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<section class="widget el-sidebar-widgets">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</section>
			<?php endif; ?>

		</aside><!-- .right-sidebar -->

	</div><!-- .blog-two-column -->

<?php
get_footer();