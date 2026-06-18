<?php
/**
 * Posts Home blog layout
 *
 * @package Elementic
 */

get_header();

// Get 5 categories with highest post count.
$category_tabs = get_categories(
	array(
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 5,
		'hide_empty' => false,
	)
);
?>

<main id="primary" class="site-main">
	<header class="page-header">
		<h1 class="page-title"><?php echo esc_html__( 'Our Recent Blog', 'elementic' ); ?></h1>
		<div class="el-blog-tabs" role="tablist">
			<?php
			$first_tab = true;
			foreach ( $category_tabs as $category_tab ) :
				$is_active     = $first_tab ? 'is-active' : '';
				$aria_selected = $first_tab ? 'true' : 'false';
				?>
				<button class="el-blog-tab <?php echo esc_attr( $is_active ); ?>" data-filter="<?php echo esc_attr( $category_tab->slug ); ?>" role="tab" aria-selected="<?php echo esc_attr( $aria_selected ); ?>"><?php echo esc_html( $category_tab->name ); ?></button>
				<?php
				$first_tab = false;
			endforeach;
			?>
		</div>
	</header>

	<div class="el-blog-layout">
		<div class="el-blog-content">
			<div class="el-blog-loop">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$cats  = get_the_category();
						$slugs = array();
						foreach ( $cats as $c ) {
							$slugs[] = $c->slug;
						}
						$data_cats = implode( ' ', array_map( 'sanitize_html_class', $slugs ) );
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'el-blog-card' ); ?> data-cats="<?php echo esc_attr( $data_cats ); ?>">
							<div class="el-card-media">
								<a href="<?php the_permalink(); ?>" class="el-card-thumb" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: Post title */ __( 'Read more about %s', 'elementic' ), get_the_title() ) ); ?>">
									<?php
									if ( has_post_thumbnail() ) {
										$thumbnail_id = get_post_thumbnail_id();
										$alt_text     = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
										if ( empty( $alt_text ) ) {
											$alt_text = get_the_title();
										}
										echo get_the_post_thumbnail(
											get_the_ID(),
											'large',
											array( 'alt' => esc_attr( $alt_text ) )
										);
									} else {
										echo '<span class="el-thumb-placeholder"></span>';
									}
									?>
								</a>
								<?php
								if ( ! empty( $cats ) ) :
									$first = $cats[0];
									?>
									<a class="el-chip" href="<?php echo esc_url( get_category_link( $first->term_id ) ); ?>"><?php echo esc_html( $first->name ); ?></a>
								<?php endif; ?>
							</div>
							<div class="el-card-body">
								<h2 class="el-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="el-card-excerpt"><?php the_excerpt(); ?></div>
								<div class="el-card-meta">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
									<span class="sep">•</span>
									<span class="author"><?php echo esc_html( get_the_author() ); ?></span>
								</div>
							</div>
						</article>
						<?php
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php
			// Pagination.
			if ( function_exists( 'elementic_numeric_pagination' ) ) {
				elementic_numeric_pagination();
			} else {
				the_posts_pagination( array( 'mid_size' => 2 ) );
			}
			?>
		</div>

		<aside class="el-blog-sidebar">
			<section class="el-widget el-categories">
				<h2 class="el-widget-title"><?php echo esc_html__( 'Our Category', 'elementic' ); ?></h2>
				<?php
				// Get 15 most popular categories (ordered by post count, highest first).
				$popular_categories = get_categories(
					array(
						'orderby'    => 'count',
						'order'      => 'DESC',
						'number'     => 15,
						'hide_empty' => false,
					)
				);
				if ( ! empty( $popular_categories ) ) {
					?>
					<ul class="el-category-list">
						<?php foreach ( $popular_categories as $popular_category ) : ?>
							<li class="el-category-item">
								<a href="<?php echo esc_url( get_category_link( $popular_category->term_id ) ); ?>" class="el-category-name">
									<?php echo esc_html( $popular_category->name ); ?>
								</a>
								<span class="el-category-count">(<?php echo esc_html( $popular_category->count ); ?>)</span>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php
				}
				?>
			</section>
			<?php get_sidebar(); ?>
		</aside>
	</div>
</main>

<?php
get_footer();
