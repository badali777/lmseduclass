<?php
/**
 * The template for displaying the footer
 *
 * @package Elementic
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="el-footer-main">
			<div class="el-footer-container">
				<div class="el-footer-columns">
					<!-- Column 1: Theme Update -->
					<div class="el-footer-col el-footer-about">
						<?php
						$footer_title       = get_theme_mod( 'elementic_footer_title', get_bloginfo( 'name' ) );
						$footer_description = get_theme_mod( 'elementic_footer_description', esc_html__( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'elementic' ) );
						?>
						<?php if ( ! empty( $footer_title ) ) : ?>
							<h2 class="el-footer-title"><?php echo esc_html( $footer_title ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $footer_description ) ) : ?>
							<p class="el-footer-desc"><?php echo wp_kses_post( $footer_description ); ?></p>
						<?php endif; ?>
						<?php
						$social_links = array(
							'facebook'  => get_theme_mod( 'elementic_footer_facebook', 'https://facebook.com' ),
							'instagram' => get_theme_mod( 'elementic_footer_instagram', 'https://instagram.com' ),
							'youtube'   => get_theme_mod( 'elementic_footer_youtube', 'https://youtube.com' ),
							'twitter'   => get_theme_mod( 'elementic_footer_twitter', 'https://twitter.com' ),
						);
						// Use defaults if values are empty.
						if ( empty( $social_links['facebook'] ) ) {
							$social_links['facebook'] = 'https://facebook.com';
						}
						if ( empty( $social_links['instagram'] ) ) {
							$social_links['instagram'] = 'https://instagram.com';
						}
						if ( empty( $social_links['youtube'] ) ) {
							$social_links['youtube'] = 'https://youtube.com';
						}
						if ( empty( $social_links['twitter'] ) ) {
							$social_links['twitter'] = 'https://twitter.com';
						}
						$has_social = false;
						foreach ( $social_links as $url ) {
							if ( ! empty( $url ) ) {
								$has_social = true;
								break;
							}
						}
						?>
						<?php if ( $has_social ) : ?>
							<div class="el-footer-social">
								<?php if ( ! empty( $social_links['facebook'] ) ) : ?>
									<a href="<?php echo esc_url( $social_links['facebook'] ); ?>" target="_blank" rel="noopener noreferrer" class="el-social-icon el-social-facebook" aria-label="<?php esc_attr_e( 'Facebook', 'elementic' ); ?>">
										<span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'elementic' ); ?></span>
										<svg class="el-social-icon-svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
											<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
										</svg>
									</a>
								<?php endif; ?>
								<?php if ( ! empty( $social_links['instagram'] ) ) : ?>
									<a href="<?php echo esc_url( $social_links['instagram'] ); ?>" target="_blank" rel="noopener noreferrer" class="el-social-icon el-social-instagram" aria-label="<?php esc_attr_e( 'Instagram', 'elementic' ); ?>">
										<span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'elementic' ); ?></span>
										<svg class="el-social-icon-svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
											<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
										</svg>
									</a>
								<?php endif; ?>
								<?php if ( ! empty( $social_links['youtube'] ) ) : ?>
									<a href="<?php echo esc_url( $social_links['youtube'] ); ?>" target="_blank" rel="noopener noreferrer" class="el-social-icon el-social-youtube" aria-label="<?php esc_attr_e( 'YouTube', 'elementic' ); ?>">
										<span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'elementic' ); ?></span>
										<svg class="el-social-icon-svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
											<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
										</svg>
									</a>
								<?php endif; ?>
								<?php if ( ! empty( $social_links['twitter'] ) ) : ?>
									<a href="<?php echo esc_url( $social_links['twitter'] ); ?>" target="_blank" rel="noopener noreferrer" class="el-social-icon el-social-twitter" aria-label="<?php esc_attr_e( 'Twitter', 'elementic' ); ?>">
										<span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'elementic' ); ?></span>
										<svg class="el-social-icon-svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
											<path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
										</svg>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- Column 2: Useful Links -->
					<div class="el-footer-col el-footer-links">
						<h3 class="el-footer-heading"><?php echo esc_html( get_theme_mod( 'elementic_footer_links_title', esc_html__( 'Useful Links', 'elementic' ) ) ); ?></h3>
						<?php
						if ( has_nav_menu( 'footer-useful-links' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'footer-useful-links',
									'menu_class'     => 'el-footer-menu',
									'container'      => false,
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
						} else {
							// Fallback menu items.
							?>
							<ul class="el-footer-menu">
								<li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About Us', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/services' ) ); ?>"><?php esc_html_e( 'Services', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/project' ) ); ?>"><?php esc_html_e( 'Project', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Blog', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/supports' ) ); ?>"><?php esc_html_e( 'Supports', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/terms' ) ); ?>"><?php esc_html_e( 'Term & Condition', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'elementic' ); ?></a></li>
								<li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'elementic' ); ?></a></li>
							</ul>
							<?php
						}
						?>
					</div>

					<!-- Column 3: Our Category -->
					<div class="el-footer-col el-footer-category">
						<h3 class="el-footer-heading"><?php echo esc_html( get_theme_mod( 'elementic_footer_category_title', esc_html__( 'Our Category', 'elementic' ) ) ); ?></h3>
						<?php
						if ( has_nav_menu( 'footer-category' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'footer-category',
									'menu_class'     => 'el-footer-menu',
									'container'      => false,
									'depth'          => 1,
									'fallback_cb'    => false,
								)
							);
						} else {
							// Fallback: Show categories.
							$categories = get_categories( array( 'number' => 4 ) );
							if ( ! empty( $categories ) ) {
								?>
								<ul class="el-footer-menu">
									<?php foreach ( $categories as $category ) : ?>
										<li><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></li>
									<?php endforeach; ?>
								</ul>
								<?php
							} else {
								?>
								<ul class="el-footer-menu">
									<li><a href="<?php echo esc_url( home_url( '/travel-blog' ) ); ?>"><?php esc_html_e( 'Travel Blog', 'elementic' ); ?></a></li>
									<li><a href="<?php echo esc_url( home_url( '/fashion-lifestyle' ) ); ?>"><?php esc_html_e( 'Fashion & Life Style', 'elementic' ); ?></a></li>
									<li><a href="<?php echo esc_url( home_url( '/business' ) ); ?>"><?php esc_html_e( 'Business', 'elementic' ); ?></a></li>
									<li><a href="<?php echo esc_url( home_url( '/entertainment' ) ); ?>"><?php esc_html_e( 'Entertainment', 'elementic' ); ?></a></li>
								</ul>
								<?php
							}
						}
						?>
					</div>

					<!-- Column 4: Contact Us -->
					<div class="el-footer-col el-footer-contact">
						<h3 class="el-footer-heading"><?php echo esc_html( get_theme_mod( 'elementic_footer_contact_title', esc_html__( 'Contact Us', 'elementic' ) ) ); ?></h3>
						<?php
						$footer_phone   = get_theme_mod( 'elementic_footer_phone', '+1234567890' );
						$footer_email   = get_theme_mod( 'elementic_footer_email', 'personalblog@example.com' );
						$footer_address = get_theme_mod( 'elementic_footer_address', '123 Glassford Street New York, USA' );
						// Use defaults if values are empty.
						if ( empty( $footer_phone ) ) {
							$footer_phone = '+1234567890';
						}
						if ( empty( $footer_email ) ) {
							$footer_email = 'personalblog@example.com';
						}
						if ( empty( $footer_address ) ) {
							$footer_address = '123 Glassford Street New York, USA';
						}
						?>
						<?php if ( ! empty( $footer_phone ) ) : ?>
							<div class="el-contact-item">
								<span class="el-contact-icon" aria-hidden="true">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
										<path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
									</svg>
								</span>
								<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $footer_phone ) ); ?>" class="el-contact-text"><?php echo esc_html( $footer_phone ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $footer_email ) ) : ?>
							<div class="el-contact-item">
								<span class="el-contact-icon" aria-hidden="true">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
										<path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
									</svg>
								</span>
								<a href="mailto:<?php echo esc_attr( sanitize_email( $footer_email ) ); ?>" class="el-contact-text"><?php echo esc_html( $footer_email ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( ! empty( $footer_address ) ) : ?>
							<div class="el-contact-item">
								<span class="el-contact-icon" aria-hidden="true">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
										<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
									</svg>
								</span>
								<span class="el-contact-text"><?php echo esc_html( $footer_address ); ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div><!-- .el-footer-columns -->
			</div><!-- .el-footer-container -->
		</div><!-- .el-footer-main -->

		<!-- Copyright Bar -->
		<div class="el-footer-copyright">
			<div class="el-footer-container">
				<?php
				$copyright_text = get_theme_mod( 'elementic_footer_copyright', '' );
				if ( empty( $copyright_text ) ) {
					$copyright_text = sprintf(
						/* translators: 1: Site name, 2: Current year */
						esc_html__( '%1$s. All Rights Reserved.', 'elementic' ),
						get_bloginfo( 'name' )
					);
				} else {
					// Replace [year] placeholder with current year if present.
					$copyright_text = str_replace( '[year]', date_i18n( 'Y' ), $copyright_text );
				}
				?>
				<p class="el-copyright-text"><?php echo wp_kses_post( $copyright_text ); ?></p>
			</div>
		</div><!-- .el-footer-copyright -->

		<a href="#page" class="el-back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'elementic' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Back to top', 'elementic' ); ?></span>
		</a>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>