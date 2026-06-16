<?php
/**
 * Template part for displaying posts
 *
 * @package Elementic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'el-blog-card' ); ?>>
	<div class="el-card-media">
		<?php if ( has_post_thumbnail() ) : ?>
			<a class="el-card-thumb" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: Post title */ __( 'Read more about %s', 'elementic' ), get_the_title() ) ); ?>">
				<?php
				$thumbnail_id = get_post_thumbnail_id();
				$alt_text     = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
				if ( empty( $alt_text ) ) {
					$alt_text = get_the_title();
				}
				echo get_the_post_thumbnail(
					get_the_ID(),
					'elementic-featured',
					array( 'alt' => esc_attr( $alt_text ) )
				);
				?>
			</a>
		<?php else : ?>
			<a class="el-thumb-placeholder" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: Post title */ __( 'Read more about %s', 'elementic' ), get_the_title() ) ); ?>"></a>
		<?php endif; ?>
		<?php
		$categories = get_the_category();
		if ( ! empty( $categories ) ) :
			?>
			<a class="el-chip" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
		<?php endif; ?>
	</div>

	<div class="el-card-body">
		<header class="el-card-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="el-card-title">', '</h2>' );
			else :
				the_title( '<h3 class="el-card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			endif;
			if ( 'post' === get_post_type() ) :
				?>
				<div class="el-card-meta">
					<?php
					elementic_posted_on();
					elementic_posted_by();
					?>
				</div>
			<?php endif; ?>
		</header>

		<div class="el-card-excerpt entry-content">
			<?php
			if ( is_singular() ) :
				the_content();
			else :
				the_excerpt();
			endif;
			?>
		</div>

		<footer class="entry-footer el-card-footer">
			<?php elementic_entry_footer(); ?>
		</footer>
	</div>
</article>