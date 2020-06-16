<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pureweb
 */

get_header();
?>
<section class="blog-wrapper">
	<div class="container">	
		<div class="not-found">
			<h2 class="section-title"><?php echo esc_html("404", "pureweb") ?></h2>
			<p class="not-found__text">Странца не найдена :( <br>Возможно она перемещена или удалена</p>
			<a href="<?php echo esc_url(get_home_url("/")) ?>" class="not-found__link btn"><?php echo esc_html_e("Домой", "pureweb") ?></a>
		</div>
	</div>
</section>
<?php
get_footer();
