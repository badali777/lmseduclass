<?php
/**
 * Template Name: All Categories
 * Template Post Type: page
 *
 * @package Elementic
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
			<?php

		endwhile;

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
		<div class="posts-container el-blog-loop">
			<?php
			foreach ( $cats_page as $cat_item ) :
				$cat = $cat_item; // phpcs:ignore
				?>
				<article class="post type-category el-blog-card category-card">
						<div class="el-card-media">
							<?php
							// Try to get category image if set.
							$cat_image = get_term_meta( $cat->term_id, 'category_image', true );
							if ( $cat_image ) :
								?>
								<a class="el-card-thumb" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">
									<img src="<?php echo esc_url( $cat_image ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" />
								</a>
								<?php
								else :
									?>
								<a class="el-thumb-placeholder" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"></a>
									<?php
								endif;
								?>
						</div>

						<div class="el-card-body">
							<header class="el-card-header">
								<h3 class="el-card-title">
									<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" rel="bookmark">
										<?php echo esc_html( $cat->name ); ?>
									</a>
								</h3>
								<div class="el-card-meta">
									<span class="post-count">
										<?php
										printf(
											esc_html( /* translators: %d: number of posts in category */ _n( '%d post', '%d posts', $cat->count, 'elementic' ) ),
											absint( $cat->count )
										);
										?>
									</span>
								</div>
									<?php if ( ! empty( $cat->description ) ) : ?>
									<div class="el-card-excerpt entry-content">
										<?php echo wp_kses_post( wpautop( $cat->description ) ); ?>
									</div>
								<?php endif; ?>
							</header>
						</div>
					</article>
					<?php endforeach; ?>
			</div><!-- .posts-container -->

			<?php
			// Display numeric pagination matching blog post pagination.
			if ( $total_pages > 1 ) :
				?>
				<div class="numeric-pagination">
					<ul class="numeric-pagination-list">
						<?php
						// Previous link.
						if ( 1 < $current_page ) :
							$prev_link = ( 1 === $current_page - 1 ) ? get_permalink() : add_query_arg( 'paged', $current_page - 1, get_permalink() );
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
								$page_link = ( 1 === $i ) ? get_permalink() : add_query_arg( 'paged', $i, get_permalink() );
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
								<a class="page-link" href="<?php echo esc_url( add_query_arg( 'paged', $current_page + 1, get_permalink() ) ); ?>" rel="next"><?php esc_html_e( 'Next →', 'elementic' ); ?></a>
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
			<div class="no-posts-found">
				<p><?php esc_html_e( 'No categories found.', 'elementic' ); ?></p>
			</div>
		<?php endif; ?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();

