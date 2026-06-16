<?php
/**
 * Template for displaying all categories
 *
 * @package Elementic
 */

get_header();
?>

	<div class="blog-two-column">

		<main id="primary" class="site-main">

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'All Categories', 'elementic' ); ?></h1>
			</header>

			<?php
			// Get all non-empty categories ordered by count.
			$all_cats = get_categories(
				array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'hide_empty' => true,
				)
			);
			?>

		<?php if ( ! empty( $all_cats ) ) : ?>
			<?php
			// Pagination setup for categories.
			$cats_per_page = 12;
			$total_cats    = count( $all_cats );
			$total_pages   = ceil( $total_cats / $cats_per_page );
			$current_page  = max( 1, get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1 );
			$offset        = ( $current_page - 1 ) * $cats_per_page;
			$cats_page     = array_slice( $all_cats, $offset, $cats_per_page ); // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query
			?>
			<div class="categories-grid el-blog-loop">
				<?php foreach ( $cats_page as $cat_obj ) : // phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase ?>
					<div class="category-card el-blog-card">
						<div class="el-card-media">
							<?php
							// Try to get category image if set.
							$cat_image = get_term_meta( $cat_obj->term_id, 'category_image', true );
							if ( $cat_image ) :
								?>
								<a class="el-card-thumb" href="<?php echo esc_url( get_category_link( $cat_obj->term_id ) ); ?>">
									<img src="<?php echo esc_url( $cat_image ); ?>" alt="<?php echo esc_attr( $cat_obj->name ); ?>" />
								</a>
								<?php
							else :
								?>
								<a class="el-thumb-placeholder" href="<?php echo esc_url( get_category_link( $cat_obj->term_id ) ); ?>"></a>
								<?php
							endif;
							?>
						</div>

						<div class="el-card-body">
							<h3 class="el-card-title">
								<a href="<?php echo esc_url( get_category_link( $cat_obj->term_id ) ); ?>">
									<?php echo esc_html( $cat_obj->name ); ?>
								</a>
							</h3>

							<?php if ( ! empty( $cat_obj->description ) ) : ?>
								<div class="el-card-excerpt">
									<?php echo wp_kses_post( wpautop( $cat_obj->description ) ); ?>
								</div>
							<?php endif; ?>

							<div class="el-card-meta">
								<?php
								printf(
									esc_html( /* translators: %d: number of posts in category */ _n( '%d post', '%d posts', $cat_obj->count, 'elementic' ) ),
									absint( $cat_obj->count )
								);
								?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<?php
			// Display numeric pagination matching blog post pagination.
			if ( $total_pages > 1 ) :
				?>
				<div class="numeric-pagination">
					<ul class="numeric-pagination-list">
						<?php
						// Previous link.
						if ( 1 < $current_page ) :
							$prev_link = ( 1 === $current_page - 1 ) ? get_term_link( get_queried_object() ) : add_query_arg( 'paged', $current_page - 1, get_term_link( get_queried_object() ) );
							?>
							<li class="page-item prev">
								<a class="page-link" href="<?php echo esc_url( $prev_link ); ?>" rel="prev"><?php esc_html_e( '← Previous', 'elementic' ); ?></a>
							</li>
							<?php
						endif;

						// Page numbers.
						for ( $i = 1; $i <= $total_pages; ++$i ) :
							if ( $i === $current_page ) :
								?>
								<li class="page-item current">
									<span class="page-number"><?php echo absint( $i ); ?></span>
								</li>
								<?php
							else :
								$page_link = ( 1 === $i ) ? get_term_link( get_queried_object() ) : add_query_arg( 'paged', $i, get_term_link( get_queried_object() ) );
								?>
								<li class="page-item">
									<a class="page-link" href="<?php echo esc_url( $page_link ); ?>"><?php echo absint( $i ); ?></a>
								</li>
									<?php
								endif;
						endfor;

						// Next link.
						if ( $total_pages > $current_page ) :
							?>
							<li class="page-item next">
								<a class="page-link" href="<?php echo esc_url( add_query_arg( 'paged', $current_page + 1, get_term_link( get_queried_object() ) ) ); ?>" rel="next"><?php esc_html_e( 'Next →', 'elementic' ); ?></a>
							</li>
							<?php
						endif;
						?>
					</ul>
				</div><!-- .numeric-pagination -->
				<?php
			endif;
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No categories found.', 'elementic' ); ?></p>
		<?php endif; ?>		</main><!-- #primary -->

		<aside id="secondary" class="right-sidebar">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<section class="widget el-sidebar-widgets">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</section>
			<?php endif; ?>
		</aside><!-- .right-sidebar -->

	</div><!-- .blog-two-column -->

<?php
get_footer();
