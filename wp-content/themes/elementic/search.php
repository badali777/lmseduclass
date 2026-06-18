<?php
/**
 * The template for displaying search results pages
 *
 * @package Elementic
 */

get_header();

// Get search query.
$search_query = get_search_query();
?>

	<main id="primary" class="site-main">
		<div class="el-search-page">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf(
							/* translators: %s: search query */
							esc_html__( 'Search Results for: %s', 'elementic' ),
							'<span class="search-query">' . esc_html( $search_query ) . '</span>'
						);
						?>
					</h1>
					<?php
					global $wp_query;
					$total_results = $wp_query->found_posts;
					printf(
						/* translators: %d: number of results */
						'<p class="search-results-count">' . esc_html__( 'Found %d result(s)', 'elementic' ) . '</p>',
						absint( $total_results )
					);
					?>
				</header><!-- .page-header -->

				<div class="el-search-results-grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						$post_type_obj   = get_post_type_object( get_post_type() );
						$post_type_label = $post_type_obj ? $post_type_obj->labels->singular_name : get_post_type();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'el-search-result-card' ); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="el-search-card-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'medium' ); ?>
									</a>
								</div>
							<?php endif; ?>
							<div class="el-search-card-content">
								<div class="el-search-card-meta">
									<span class="el-search-post-type"><?php echo esc_html( $post_type_label ); ?></span>
									<span class="el-search-post-date"><?php echo esc_html( get_the_date() ); ?></span>
								</div>
								<h2 class="el-search-card-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<div class="el-search-card-excerpt">
									<?php the_excerpt(); ?>
								</div>
								<div class="el-search-card-footer">
									<a href="<?php the_permalink(); ?>" class="el-search-read-more">
										<?php esc_html_e( 'Read More', 'elementic' ); ?>
										<i class="fas fa-arrow-right" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</article>
						<?php
					endwhile;
					?>
				</div><!-- .el-search-results-grid -->

				<?php
				// Pagination.
				the_posts_pagination(
					array(
						'prev_text' => '<i class="fas fa-chevron-left" aria-hidden="true"></i> ' . esc_html__( 'Previous', 'elementic' ),
						'next_text' => esc_html__( 'Next', 'elementic' ) . ' <i class="fas fa-chevron-right" aria-hidden="true"></i>',
					)
				);
				?>

			<?php else : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf(
							/* translators: %s: search query */
							esc_html__( 'No Results Found for: %s', 'elementic' ),
							'<span class="search-query">' . esc_html( $search_query ) . '</span>'
						);
						?>
					</h1>
					<p class="search-no-results-message">
						<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'elementic' ); ?>
					</p>
				</header><!-- .page-header -->

				<div class="el-search-suggestions">
					<h3><?php esc_html_e( 'Search Suggestions:', 'elementic' ); ?></h3>
					<ul>
						<li><?php esc_html_e( 'Check your spelling', 'elementic' ); ?></li>
						<li><?php esc_html_e( 'Try more general keywords', 'elementic' ); ?></li>
						<li><?php esc_html_e( 'Try different keywords', 'elementic' ); ?></li>
						<li><?php esc_html_e( 'Reduce the number of keywords', 'elementic' ); ?></li>
					</ul>
				</div>

			<?php endif; ?>
		</div><!-- .el-search-page -->
	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();