<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pureweb
 */

get_header();
global $pureweb_redux;
?>

<section id="portfolio" class="portfolio tabs">
    <div class="container">
        <div class="section-titles d-flex justify-content-between">
            <h2 class="section-title">
                <?php echo pll__('Портфолио'); ?>
            </h2>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'work_categories_list',
                'menu'           => '',
                'container'      => '',
                'menu_class'     => 'section-tab-navigation d-flex tabs__caption',
                'after'          => ''
            ));
            ?>
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn active">
        	<?php
        	while(have_posts()):
        		the_post();?>

        		<div class="portfolio-item">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full"); ?>" alt="work" class="portfolio-item__thumbnail">
                    <div class="mask">
                        <div class="mask__container d-flex justify-content-center">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="look_item">
                                <span><?php echo pll__("Подробнее"); ?></span>
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                </div>

        	<?php endwhile;

        	// the_posts_navigation();
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
get_footer(); ?>
