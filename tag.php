<?php 
/**
 * This file to display tag arhive pages
 * @link https://codex.wordpress.org/Tag_Templates
 *
 * @package pureweb
 */
get_header();
?>

<section id="portfolio" class="portfolio tabs">
    <div class="container">
        <div class="section-titles d-flex justify-content-between">
            <span style="line-height: 1.5em; font-size: 16px">
                <?php $tags = get_the_tags();
                if($tags):
	                foreach ($tags as $tag) {
	                	echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'" class="tags-box__tag">'.$tag->name.'</a>';
	                }
            	endif;
                ?>
            </span>
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn active">
        	<?php
        	while(have_posts()):
        		the_post(); ?>

        		<div class="portfolio-item">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full"); ?>" alt="work" class="portfolio-item__thumbnail">
                    <div class="mask">
                        <div class="mask__container d-flex justify-content-center">
                            <ul class="mask__info-block">
                            	<?php echo '<a href="'.esc_url(get_permalink()).'" style="line-height: 1.5em">'; ?>
                            	<?php the_title(); ?>
                            	<?php echo '</a>' ?>
                            </ul>
                        </div>
                    </div>
                </div>
        		
        	<?php
            endwhile;
        	?>
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