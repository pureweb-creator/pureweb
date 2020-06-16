<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pureweb
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area page-sidebar">
	<div class="page-sidebar__box">
	<?php
	$cats = get_categories(array(
		'taxonomy'     => 'category',
		'hide_empty'   => false
	));
	echo '<h3 class="sidebar__title">'.__('Категории').'</h3>';
	echo '<ul class="sidebar_categories">';
	// print_r($cats);
	foreach ($cats as $cat) {
		echo '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'<span>'.$cat->category_count.'</span>'.'</li></a>';
	}
	echo '</ul>';
	?>
	</div>

	<div class="page-sidebar__box">
	<?php
	// Почему нельзя было вывести обычный WP_Query по последним постам???
	$recent_posts =  wp_get_recent_posts(array(
		'numberposts'  => 3,
		'posts_status' => 'publish'
	));

	 $archive_year  = get_the_time( 'Y' ); 
     $archive_month = get_the_time( 'm' ); 
     $archive_day   = get_the_time( 'd' ); 


	echo '<h3 class="sidebar__title">'. __('Последние посты') .'</h3>'; ?>
	<?php foreach ($recent_posts as $post) { ?>
		<a href="<?php echo get_permalink($post['ID']); ?>" class="recent-post d-flex">
			<div class="recent-post__thumbnail">
				<img src="<?php echo get_the_post_thumbnail_url($post['ID'], "full", true); ?>" alt="thumbnail" class="thumbnail__img">
			</div>
			<div class="recent-post__text">
				<h4 class="recent-post__title"><?php echo $post['post_title']; ?></h4>
				<span class="recent-post__date pubdate">
					<i class="fa fa-clock"></i>
				<?php echo get_the_date(); ?>
				</span>
				<span class="views recent-post__views">
					<i class="fa fa-eye"></i>
					<?php echo get_post_meta($post['ID'], "views" ,true); ?>
				</span>
			</div>
		</a>
	<?php }
	?>
	</div>

	<div class="page-sidebar__box">
	<?php
	echo '<h3 class="sidebar__title">'. __('Теги') .'</h3>';

	$tags = get_tags(array(
		'hide_empty' => true));
		// print_r($tags);
		foreach ($tags as $tag) {
			echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'" class="tags-box__tag">'.$tag->name.'</a>';	
		}

	?>

	<?php wp_reset_postdata(); ?>
	</div>
</aside>
