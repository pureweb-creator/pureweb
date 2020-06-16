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
                <?php echo __('Портфолио') ?>
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
        		the_post();
        		$deadline = get_field('deadline'); ?>

        		<div class="portfolio-item">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full"); ?>" alt="work" class="portfolio-item__thumbnail">
                    <div class="mask">
                        <div class="mask__container d-flex justify-content-center">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="look_item">
                                <span><?php echo $pureweb_redux['view_more'] ?></span>
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
        <!-- Чисто делаем вид что типо чето грузим :D ©Roman Semenikhin -->
        <div class="portfolio-wrap tabs__content">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content">
           Загрузка данных
        </div>
    </div>
</section>

<?php
get_footer(); ?>