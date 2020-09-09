<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package pureweb
 */

get_header();
?>
<section id="portfolio" class="portfolio tabs">
    <div class="container">
        <div class="section-titles d-flex justify-content-between">
            <span class="search-result-title" style="font-size: 18px">
                <?php if(have_posts()): echo pll__("Вот, что удалось найти по запросу ") . '<span class="search-result-query" style="font-weight: 700">' . get_search_query() . '</span>'; endif; ?>
            </span>
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn active">
        	<!-- Main content -->
					<?php
						if(have_posts()):
							while (have_posts()): the_post(); ?>
								<div class="portfolio-item">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full"); ?>" alt="work" class="portfolio-item__thumbnail post-<?php the_ID(); ?>">
										<div class="mask">
												<div class="mask__container d-flex justify-content-center">
														<a href="<?php echo esc_url(get_permalink()); ?>" class="look_item">
																<span><?php echo pll__("Подробнее"); ?></span>
																<i class="fa fa-link"></i>
														</a>
												</div>
										</div>
								</div>
							<?php
								endwhile;
							else:
								echo pll__("Извините, ничего не удалось найти :(");
							endif; ?>

        	<div class="pagination">
                <?php
                echo paginate_links( array(
                    'prev_text' => '&larr;',
                    'next_text' => '&rarr;'
                ) );
            	?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
