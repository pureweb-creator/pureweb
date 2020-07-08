<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pureweb
 */

get_header();
?>

<?php

$archive_year  = get_the_time( 'Y' );
$archive_month = get_the_time( 'm' );
$archive_day   = get_the_time( 'd' );

if (have_posts()){
	while (have_posts()) {
		the_post();
?>
<section class="single-page">
	<div class="single-page__cover" style="background: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), "full", true)); ?>) no-repeat fixed center center / cover;">
		<div class="cover__mask">
			<h2 class="section-titles cover__title">
				<?php the_title(); ?>
			</h2>
		</div>
	</div>
	<div class="container">
		<div class="single-page__grid">
			<div class="single-page__main-content">
			<article class="single-page__article blog-article">
				<div class="article__info">
					<?php
					if ( get_post_meta(get_the_ID(), "views", true) ){ ?>
						<span class="views"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), "views", true); ?></span>
					<?php }
					?>
					<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>" class="pubdate">
						<i class="fa fa-clock"></i>
						<?php the_date(); ?>
					</a>
				</div>
				<?php echo get_the_post_thumbnail(get_the_ID(), "full", $default_attr = array(
					'class' => "article__main-image"
				),true) ?>
				<h1 class="section-titles single-page__title">
					<?php the_title(); ?>
				</h1>
				<div class="article__text">
					<?php the_content(); ?>
				</div>
				<div class="tags-box">
					<?php
					$tags = get_the_tags(get_the_ID());

					if($tags):
						foreach ($tags as $tag) {
							echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'" class="tags-box__tag">'.$tag->name.'</a>';
						}
					endif;
					?>
				</div>
			</article>
			<?php comments_template();?>
			</div>
			<?php get_sidebar(); ?>
		</div>
		<div class="related">
			<?php
			echo "<br><br><h3>" . "<a href='javascript:void(0)' class='related__load-new' onclick='location.reload();'>".__("&#8634;")."</a>" . __('Статьи на эту же тему') . "</h3><br><br>";

			// Related by catagories
			$cur_cat = get_the_category(get_the_ID());

			$categories = array();
			if($cur_cat):
				foreach ($cur_cat as $cat):
					array_push($categories, $cat->slug);
				endforeach;
			endif;

			// Related by $tags
			$cur_tag = get_the_tags(get_the_ID());
			$tags = array();

			if($cur_tag):
				foreach ($cur_tag as $tag) {
					array_push($tags, $tag->slug);
				}
			endif;

			$related = new WP_Query(array(
				'posts_per_page' => '3',
				'post_type'      => 'post',
				'orderby'        => 'rand',
				'tax_query'      => [
					'relation' => 'OR',
					[
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $categories,
					],
					[
						'taxonomy' => 'tag',
						'field'    => 'slug',
						'terms'    => $tags,
					]
				]
			));

			if($related->have_posts()):
				while ($related->have_posts()):
					$related->the_post();
					?>
					<a href="<?php echo get_permalink(get_the_ID()); ?>" class="recent-post d-flex">
						<div class="recent-post__thumbnail">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full", true); ?>" alt="thumbnail" class="thumbnail__img">
						</div>
						<div class="recent-post__text">
							<h4 class="recent-post__title"><?php echo the_title(); ?></h4>
							<span class="recent-post__date pubdate">
								<i class="fa fa-clock"></i>
								<?php echo get_the_date(); ?>
							</span>
							<span class="views recent-post__views">
								<i class="fa fa-eye"></i>
								<?php echo get_post_meta(get_the_ID(), "views", true); ?>
							</span>
						</div>
					</a>
					<?php
				endwhile;
			else:
				echo "No posts found";
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php

	}
}

?>

<?php
get_footer();
