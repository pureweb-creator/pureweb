<?php
/**
 * Template name: My Account
 *
 * This template show "My account" page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pureweb
 */

get_header();

if(have_posts()):
  while (have_posts()):
    the_post();
    the_content();
  endwhile;
endif;

get_footer();
?>
