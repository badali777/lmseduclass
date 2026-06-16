<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elms
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-class'); ?>>
  <div class="row">
    <div class="col-lg-12">
      <div class="post-details">
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>

        <?php endif; ?>
      </div>
      <div class="entry-header">
        <?php
        if ( is_singular() ) :
          the_title( '<h1 class="entry-title">', '</h1>' );
        else :
          the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) :
          ?>
          <div class="entry-meta">
            <ul>
              <li>
                <?php
                elms_posted_by();?>
              </li>                    <li>
                <?php
                elms_posted_on();?>
              </li>                    <li>
                <?php
                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ){
                  elms_comment_by();
                }
                ?>
              </li>
            </ul>
          </div><!-- .entry-meta -->
        <?php endif; ?>
      </div><!-- .entry-header -->

      <div class="entry-content">
        <?php
        the_content();
        ?>

        <?php
        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elms' ),
            'after'  => '</div>',
          )
        );
        ?>
      </div>
	    <?php if (is_singular('post')) : ?>
		    <?php
		    $post_url   = urlencode(get_permalink());
		    $post_title = urlencode(get_the_title());
		    $raw_url    = esc_url(get_permalink());
		    ?>
            <div class="share-article-box">
                <span class="share-article-label"><?php echo esc_html__("Share this article", "elms");?></span>
                <div class="share-article-buttons">

                    <!-- Twitter / X -->
                    <a href="https://twitter.com/intent/tweet?text=<?php echo $post_title; ?>&url=<?php echo $post_url; ?>"
                       class="share-btn share-btn--twitter"
                       target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.742l7.73-8.835L2.25 2.25h6.978l4.256 5.632 4.76-5.632Zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                        <span><?php echo esc_html__("Twitter", "elms");?></span>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
                       class="share-btn share-btn--facebook"
                       target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span><?php echo esc_html__("Facebook", "elms");?></span>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>"
                       class="share-btn share-btn--linkedin"
                       target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        <span><?php echo esc_html__("LinkedIn", "elms");?></span>
                    </a>

                    <!-- Copy Link -->
                    <button class="share-btn share-btn--copy js-copy-link"
                            data-url="<?php echo $raw_url; ?>"
                            aria-label="Copy link">
                        <svg class="icon-copy" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                        </svg>
                        <svg class="icon-check" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <span class="copy-label"><?php echo esc_html__("Copy Link", "elms");?></span>
                    </button>

                </div>
            </div>
	    <?php endif; ?>
      <div class="entry-footer">
        <div class="entry-meta taxonomies">
          <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
        </div>
      </div><!-- .entry-footer -->
    </div>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
