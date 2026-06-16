<?php
/**
 * Title: Personal Contacts
 * Slug: makoa-personal/personal-contacts
 * Categories: makoa-personal
 */
?>

<!-- wp:group {"metadata":{"name":"Contacts"},"anchor":"contacts","style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"right":"0","left":"0","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div id="contacts" class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0"><!-- wp:heading -->
<h2 class="wp-block-heading"><?php echo esc_html__( 'Get in Touch', 'makoa-personal' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><?php echo esc_html__( 'Have a project in mind or just want to say hello? I\'d love to hear from you.', 'makoa-personal' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} -->
<h3 class="wp-block-heading" style="font-size:20px"><?php echo esc_html__( 'Email', 'makoa-personal' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><a href="mailto:hello@example.com"><?php echo esc_html__( 'hello@example.com', 'makoa-personal' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}}} -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} -->
<h3 class="wp-block-heading" style="font-size:20px"><?php echo esc_html__( 'Phone', 'makoa-personal' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px"><a href="tel:+1234567890"><?php echo esc_html__( '+1 (234) 567-890', 'makoa-personal' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link wp-element-button" href="mailto:hello@example.com"><?php echo esc_html__( 'Send Me a Message', 'makoa-personal' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
