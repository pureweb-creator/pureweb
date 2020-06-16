<?php 
/**
 * Template name: Blog
 * Author: Roman Semenihin / PUREWEB
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package pureweb
 */

get_header();
?>

<?php
while(have_posts()){
	the_post();
	?>
	
	<section class="blog-wrapper">
		<div class="container">	
			<h2 class="section-title blog-title"><?php the_title(); ?></h2>
			<div class="section-text blog-text">
				<?php the_content(); ?>
			</div>
			<?php
			wp_nav_menu(array(
				'menu' => '',
				'theme_location' => 'social_menu',
				'menu_class' => 'social',
				'container' => ''
			));
			?>
			<?php
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$blog_post_output = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => '13',
				'paged'          => $paged
			)); ?>
			<div class="blog-posts d-flex">
				<?php 
				if ($blog_post_output->have_posts()){
					while ($blog_post_output->have_posts()) {
						$blog_post_output->the_post(); ?>
						
						<a href="<?php echo esc_url(get_permalink()); ?>" class="d-flex blog-posts__item <?php echo get_field('size'); ?>">
							<?php
							if (get_the_post_thumbnail(get_the_ID(), "full", true)){ ?>
								<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), "full", true)); ?>" class="post__thumbnail" alt="post thumbnail">
							<?php }
							?>
							<div class="item__content">
								<div class="item__head">
									<h3 class="item__title" style="color: #fff"><?php the_title(); ?></h3>
									<?php
									if ( get_post_meta(get_the_ID(), "views", true) ){ ?>
										<span class="views"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), "views", true); ?></span>
									<?php }
									?>
									<?php 
			                            if( get_comments_number(get_the_ID()) ): ?>
			                            <span class="comments views"><i class="fa fa-comments"></i><?php echo get_comments_number(get_the_ID()); ?></span>
			                            
			                           <?php endif;
			                        ?>
									<span class="pubdate">
										<i class="fa fa-clock"></i>
										<?php echo get_the_date(); ?>
									</span>
								</div>
								<div class="item__text">
									<?php
									if( has_excerpt() ){
										the_excerpt();
									} else {
										echo wp_trim_words(get_the_content(), 100, "...");
									}
									?>
								</div>
							</div>
							<div class="blog-posts__item_mask"></div>
						</a>

						<?php
					}
				}

				wp_reset_postdata();

				?>
			</div>
			<div class="pagination">
				<?php
                    $big = 999999999;
                    echo paginate_links( array(
                        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'current'   => max( 1, get_query_var('paged') ),
                        'total'     => $blog_post_output->max_num_pages,
                        'prev_text' => '&larr;',
                        'next_text' => '&rarr;',
                        'type'      => 'plain'
                    ) );
                ?>
			</div>
		</div>
	</section>

<?php

}	

get_footer();