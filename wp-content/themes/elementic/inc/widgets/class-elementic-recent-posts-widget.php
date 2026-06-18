<?php
/**
 * Recent Posts Widget with Thumbnails
 *
 * @package Elementic
 */

if ( ! class_exists( 'Elementic_Recent_Posts_Widget' ) ) {

	/**
	 * Recent Posts Widget class.
	 *
	 * Display recent posts with thumbnails in widgets.
	 */
	class Elementic_Recent_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			parent::__construct(
				'elementic_recent_posts',
				esc_html__( 'Elementic: Recent Posts', 'elementic' ),
				array( 'description' => esc_html__( 'Display recent posts with thumbnails.', 'elementic' ) )
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5;

			$query_args = array(
				'post_type'           => 'post',
				'posts_per_page'      => $number,
				'ignore_sticky_posts' => true,
			);

			$recent_posts = new WP_Query( $query_args );

			if ( $recent_posts->have_posts() ) :
				echo '<ul class="elementic-recent-posts">';
				while ( $recent_posts->have_posts() ) :
					$recent_posts->the_post();
					echo '<li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					if ( has_post_thumbnail() ) {
						echo '<div class="recent-post-thumbnail"><a href="' . esc_url( get_the_permalink() ) . '">';
						the_post_thumbnail( 'thumbnail' );
						echo '</a></div>';
					}
					echo '<div class="recent-post-content"><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
					echo '<span class="post-date">' . esc_html( get_the_date() ) . '</span></div>';
					echo '</li>';
				endwhile;
				wp_reset_postdata();
				echo '</ul>';
			endif;

			echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Back-end widget form.
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title  = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Posts', 'elementic' );
			$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'elementic' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'elementic' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3">
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance           = array();
			$instance['title']  = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['number'] = ( ! empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 5;
			return $instance;
		}

		/**
		 * Register the Recent Posts widget.
		 */
		public static function register() {
			register_widget( 'Elementic_Recent_Posts_Widget' );
		}
	}

	add_action( 'widgets_init', array( 'Elementic_Recent_Posts_Widget', 'register' ) );

}
