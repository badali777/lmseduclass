<?php
/**
 * Social Links Widget (class-based)
 *
 * @package Elementic
 */

if ( ! class_exists( 'Elementic_Social_Links_Widget' ) ) {

	/**
	 * Social Links Widget class.
	 *
	 * Display social media links in widgets.
	 */
	class Elementic_Social_Links_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			parent::__construct(
				'elementic_social_links',
				esc_html__( 'Elementic: Social Links', 'elementic' ),
				array( 'description' => esc_html__( 'Display social media links.', 'elementic' ) )
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

			$social_links = array(
				'facebook'  => ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '',
				'twitter'   => ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '',
				'instagram' => ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '',
				'linkedin'  => ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '',
				'youtube'   => ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '',
				'pinterest' => ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '',
			);

			$has_links = false;
			foreach ( $social_links as $link ) {
				if ( ! empty( $link ) ) {
					$has_links = true;
					break;
				}
			}

			if ( $has_links ) {
				echo '<div class="elementic-social-links">';
				foreach ( $social_links as $network => $url ) {
					if ( ! empty( $url ) ) {
						printf(
							'<a href="%1$s" target="_blank" rel="noopener noreferrer" class="social-link social-%2$s" aria-label="%3$s">',
							esc_url( $url ),
							esc_attr( $network ),
							esc_attr( ucfirst( $network ) )
						);

						echo '<span class="screen-reader-text">' . esc_html( ucfirst( $network ) ) . '</span>';
						echo '<svg width="20" height="20" aria-hidden="true">' . wp_kses_post( $this->get_social_icon_svg( $network ) ) . '</svg>';
						echo '</a>';
					}
				}
				echo '</div>';
			}

			echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Get SVG icon for social networks.
		 *
		 * @param string $network Social network name.
		 * @return string SVG path markup.
		 */
		private function get_social_icon_svg( $network ) {
			$icons = array(
				'facebook'  => '<path d="M10 0C4.477 0 0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.879V12.89h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.989C16.343 19.129 20 14.99 20 10c0-5.523-4.477-10-10-10z"/>',
				'twitter'   => '<path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"/>',
				'instagram' => '<path d="M10 0C7.284 0 6.944.012 5.878.06 4.814.11 4.086.278 3.45.525a4.896 4.896 0 00-1.771 1.154A4.908 4.908 0 00.525 3.45C.277 4.086.109 4.814.06 5.878.01 6.944 0 7.284 0 10s.012 3.056.06 4.122c.05 1.066.218 1.794.465 2.43a4.902 4.902 0 001.154 1.771 4.902 4.902 0 001.771 1.154c.636.247 1.364.415 2.43.465C6.944 19.99 7.284 20 10 20s3.056-.01 4.122-.06c1.066-.05 1.794-.218 2.43-.465a4.902 4.902 0 001.771-1.154 4.902 4.902 0 001.154-1.771c.247-.636.415-1.364.465-2.43C19.99 13.056 20 12.716 20 10s-.01-3.056-.06-4.122c-.05-1.066-.218-1.794-.465-2.43a4.902 4.902 0 00-1.154-1.771A4.902 4.902 0 0016.55.525C15.914.277 15.186.109 14.12.06 13.056.01 12.716 0 10 0zm0 4.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 8.468a3.333 3.333 0 100-6.666 3.333 3.333 0 000 6.666zm5.338-9.87a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z"/>',
				'linkedin'  => '<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 01.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>',
				'youtube'   => '<path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>',
				'pinterest' => '<path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"/>',
			);

			return isset( $icons[ $network ] ) ? $icons[ $network ] : '';
		}

		/**
		 * Back-end widget form.
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title     = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow Us', 'elementic' );
			$facebook  = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
			$twitter   = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
			$instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
			$linkedin  = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
			$youtube   = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
			$pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
			?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="url" value="<?php echo esc_url( $facebook ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="url" value="<?php echo esc_url( $twitter ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="url" value="<?php echo esc_url( $instagram ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="url" value="<?php echo esc_url( $linkedin ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_html_e( 'YouTube URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="url" value="<?php echo esc_url( $youtube ); ?>">
</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest URL:', 'elementic' ); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="url" value="<?php echo esc_url( $pinterest ); ?>">
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
			$instance              = array();
			$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? esc_url_raw( $new_instance['facebook'] ) : '';
			$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? esc_url_raw( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? esc_url_raw( $new_instance['instagram'] ) : '';
			$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
			$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? esc_url_raw( $new_instance['youtube'] ) : '';
			$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
			return $instance;
		}
	}

}
