<?php
/**
 * Template part for displaying posts
 *
 */

?>

<article class="elms-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="elms-header-content entry-header">
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

        <?php endif;

        ?>

    </header><!-- .entry-header -->
    <div class="elms-post-thumbnail">
        <?php
        if(has_post_thumbnail()){
            elms_post_thumbnail();
        }

        ?>
    </div>

    <div class="elms entry-content">
      <?php

        the_excerpt();

      if(!is_single()):
      ?>

        <p><a class="read-more-btn" href="<?php the_permalink();?>"><?php echo esc_html__( 'Read More', 'elms' ); ?><i class="fas fa-chevron-right"></i></a></p>
        <?php
        endif;
      wp_link_pages(
        array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elms' ),
          'after'  => '</div>',
        )
      );
      ?>

    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
