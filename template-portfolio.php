<?php
/**
 * Template name: Portfolio
 * Author: Roman Semenikhin
 *
 * The template for displaying all portfolio works
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
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
                <?php the_title(); ?>
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

            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $portfolio_args = array(
                'paged'          => $paged ,
                'post_type'      => 'portfolio',
                'posts_per_page' => '10'
            );

            $portfolio_query = new WP_Query($portfolio_args);

            if($portfolio_query->have_posts()){
                while  ($portfolio_query->have_posts() ) :
                    $portfolio_query->the_post(); ?>
                    <?php $deadline = get_field('deadline'); ?>
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
            ?>
            <?php } else {
                echo 'Работ не найдено';
            }

            $big = 999999999;

            wp_reset_postdata(); ?>

            <div class="pagination">
                <?php
                echo paginate_links( array(
                        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, get_query_var('paged') ),
                        'total'     => $portfolio_query->max_num_pages,
                        'prev_text' => '&larr;',
                        'next_text' => '&rarr;'
                    ) );
                ?>
            </div>
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn">
           Загрузка данных
        </div>
        <div class="portfolio-wrap tabs__content animated fadeIn">
           Загрузка данных
        </div>
    </div>
</section>

<?php
get_footer(); ?>
