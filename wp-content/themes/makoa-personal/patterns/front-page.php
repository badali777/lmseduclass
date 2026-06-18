<?php
/**
 * Title: Front Page
 * Slug: makoa-personal/front-page
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">

<!-- wp:group {"metadata":{"name":"Hero Card"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:0;padding-bottom:var(--wp--preset--spacing--60);padding-left:0"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"},"width":"0px","style":"none"}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="border-style:none;border-width:0px;border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"65%","className":"mobile-order-2","style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-center mobile-order-2" style="flex-basis:65%"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"4px","bottom":"4px","left":"12px","right":"12px"}},"border":{"radius":"20px"},"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500"}},"backgroundColor":"background-secondary","textColor":"secondary"} -->
<p class="has-secondary-color has-background-secondary-background-color has-text-color has-background" style="border-radius:20px;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px;font-size:12px;font-style:normal;font-weight:500"><?php echo esc_html__( 'Available for hire', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size" style="margin-top:var(--wp--preset--spacing--30);line-height:1.2"><?php echo esc_html__( 'Hi, I\'m Alex — a product designer crafting delightful user experiences', 'makoa-personal' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20"}},"typography":{"lineHeight":"1.7"}},"textColor":"secondary","fontSize":"normal"} -->
<p class="has-secondary-color has-text-color has-normal-font-size" style="margin-top:var(--wp--preset--spacing--20);line-height:1.7"><?php echo esc_html__( 'I partner with startups and established companies to design products that users love. Currently based in San Francisco.', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contacts"><?php echo esc_html__( 'Work with me', 'makoa-personal' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-link-color has-small-font-size"><a href="#portfolio"><?php echo esc_html__( 'View my work →', 'makoa-personal' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"300px","className":"mobile-order-1"} -->
<div class="wp-block-column is-vertically-aligned-center mobile-order-1" style="flex-basis:300px"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"20px"},"spacing":{"margin":{"right":"0","left":"0"}}}} -->
<figure class="wp-block-image size-full has-custom-border" style="margin-right:0;margin-left:0"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/hero-photo.jpg" alt="" style="border-radius:20px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"About"},"anchor":"about","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}},"backgroundColor":"background-secondary","layout":{"type":"constrained"}} -->
<div id="about" class="wp-block-group has-background-secondary-background-color has-background" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo esc_html__( 'About Me', 'makoa-personal' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><?php echo esc_html__( 'Write a compelling introduction about yourself here. Share your background, experience, and what drives you. This is your opportunity to connect with visitors on a personal level and establish trust.', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><?php echo esc_html__( 'Highlight your unique value proposition and explain how you can help your visitors. Keep it authentic and focused on the benefits you provide. End with a call to action or an invitation to learn more.', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px"}}} -->
<h3 class="wp-block-heading" style="font-size:32px"><?php echo esc_html__( '10+', 'makoa-personal' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'Years of Experience', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px"}}} -->
<h3 class="wp-block-heading" style="font-size:32px"><?php echo esc_html__( '100+', 'makoa-personal' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'Happy Clients', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px"}}} -->
<h3 class="wp-block-heading" style="font-size:32px"><?php echo esc_html__( '50+', 'makoa-personal' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'Projects Completed', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"makoa-personal/personal-services"} /-->

<!-- wp:group {"metadata":{"name":"Blog"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo esc_html__( 'Blog', 'makoa-personal' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/blog/"><?php echo esc_html__( 'All Posts', 'makoa-personal' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":8,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"0"},"border":{"radius":"20px"}},"backgroundColor":"background-secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-secondary-background-color has-background" style="border-radius:20px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"large"} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} /-->

<!-- wp:post-terms {"term":"post_tag","style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"<?php echo esc_html__( 'Read more', 'makoa-personal' ); ?> →","style":{"spacing":{"margin":{"bottom":"0","top":"var:preset|spacing|30"}}},"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'No posts yet.', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"makoa-personal/personal-contacts"} /-->

</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
