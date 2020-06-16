<?php
/**
 * Template name: Homepage
 * Author: Roman Semenikhin / PUREWEB
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package pureweb
 */

get_header();
$animation_delay = 0;
?>
<?php
if(have_posts()){
    while (have_posts()){
        the_post(); ?>

<section id="services" class="services">
    <div class="container">
        <h2 class="section-title wow fadeInUp">
            <?php the_field('services_title'); ?>
        </h2>
        <div class="services__wrap d-flex">
            <?php
            $services_args = array(
                'post_type' => 'services',
                'posts_per_page' => '4',
                'order' => 'ASC',
            );
            $services = new WP_Query($services_args);
            ?>

            <?php
            if($services->have_posts()){
                while ($services->have_posts()){
                    $services->the_post();
                    $animation_delay += .2; ?>
                    <div class="item wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?php echo $animation_delay . 's'; ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full") ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>" class="item__thumbnail">
                        <h3 class="item__title"><?php the_title() ?></h3>
                        <div class="item__excerpt"><?php the_excerpt(); ?></div>
                    </div>
                <?php }
            } else{
                echo 'No posts found';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<section class="work" id="work" data-type="background" data-speed="10">
    <div class="bg-elements wow fadeInLeft" data-wow-duration="2s">
        <img src="<?php echo get_template_directory_uri() ?>/img/rocket_and_planet.png" alt="rocket and planet" class="rocket">
    </div>
    <div class="universe wow fadeIn">
        <div id="second-scene" class="universe__layers" data-friction-x="0.1" data-friction-y="0.1" data-scalar-y="12">
            <div data-depth="0.30" class="layer">
                <div class="saturn wow zoomIn"></div>
            </div>
            <div data-depth="0.50" class="layer">
                <div class="uran wow zoomIn" data-wow-delay="1.2s"></div>
            </div>
            <div data-depth="0.10" class="layer">
                <div class="upiter wow zoomIn" data-wow-delay=".8s"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="section-title wow fadeInUp">
            <?php the_field('work_process_title') ?>
        </h2>
        <div class="work-process">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'work_process',
                'menu'            => '',
                'container'       => false,
                'menu_class'      => 'work-process__timeline',
            ));
            ?>
        </div>
    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="section-titles">
            <h2 class="section-title wow fadeInUp">
                <?php the_field('portfolio_title_') ?>
            </h2>
            <div class="section-subtitle wow fadeInDown">
                <?php the_field('portfolio_subtitle') ?>
            </div>
        </div>
        <div class="portfolio-wrap">
            <?php
            $portfolio_args = array(
                'post_type'      => 'portfolio',
                'posts_per_page' => '4',
                'favourite'      => 'Yes'
            );
            $portfolio = new WP_Query($portfolio_args);
            ?>
            <?php
            if($portfolio->have_posts()){
                while($portfolio->have_posts()){
                    $portfolio->the_post(); ?>
                    <div class="portfolio-item wow fadeInUp">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="work" class="portfolio-item__thumbnail">
                        <div class="mask">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="look_item">
                                <span><?php echo $pureweb_redux['view_more'] ?></span>
                                <i class="fa fa-link"></i>
                            </a>
                        </div>
                    </div>
                <?php }
            } else {
                echo 'No posts found.';
            }
            wp_reset_postdata();
            ?>
        </div>
        <div class="order">
            <br><br>
            <a href="<?php echo get_home_url(); ?>/?page_id=87" class="btn order-btn scrollto wow zoomIn"><?php the_field('portfolio_button_text'); ?></a>
        </div>
    </div>
</section>
<section class="blog" id="blog" data-type="background" data-speed="19">
    <div class="universe">
        <div id="third-scene" class="universe__layers" data-friction-x="0.1" data-friction-y="0.1" data-scalar-y="12">
            <div data-depth="0.40" class="layer">
                <div class="planet wow zoomIn" data-wow-delay="1.8s"></div>
            </div>

            <div data-depth="0.10" class="layer">
                <div class="planet2 wow zoomIn" data-wow-delay="1s"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="section-title wow fadeInUp" style="color: #fff">
            <?php echo __("Блог"); ?>
        </h2>
        <div class="recent-blog d-flex">
        <?php 
        $recent_blog = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => '3',
            'orderby'        => 'rand'
        ));

        if($recent_blog->have_posts()):
            while ($recent_blog->have_posts()):
                $recent_blog->the_post(); ?>
                <div class="recent-blog__item">
                    <div class="recent-blog__item__thumbnail" style="background: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full', true)) ?>') no-repeat center top / cover;">
                        <div class="recent-blog__item__pubdate">
                            <span class="pubdate-day"><?php echo get_the_date('j'); ?></span>
                            <span class="pubdate-month"><?php echo substr(get_the_date('F'), 0, 3) . "."; ?></span>
                        </div>
                    </div>
                    <div class="recent-blog__info">
                        <?php
                            if ( get_post_meta(get_the_ID(), "views", true) ){ ?>
                                <span class="views"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), "views", true); ?></span>
                            <?php } else { ?>
                                 <span class="views"><i class="fa fa-eye"></i>0</span>
                            <?php }
                        ?>
                        <?php 
                            if( get_comments_number(get_the_ID()) ): ?>
                            <a href="<?php echo esc_url(get_permalink()) ?>/#comments"><span class="comments views"><i class="fa fa-comments"></i><?php echo get_comments_number(get_the_ID()); ?></span>
                            </a>
                           <?php endif;
                        ?>
                        <h3 class="recent_blog__title" title="<?php echo esc_attr(get_the_title()); ?>">
                            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="recent_blog__excerpt"><?php the_excerpt(); ?></div>
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="recent_blog__link" ><?php echo __('Читать'); ?></a>
                    </div>
                </div>
            <?php endwhile;
        else:
            echo "No posts found yet.";
        endif;
        wp_reset_postdata();
        ?>
        </div>
    </div>
    <div class="universe">
        <div id="fourth-scene" class="universe__layers" data-invert-x="false" data-limit-y="1" data-friction-x="0.1" data-friction-y="0.1" data-scalar-y="12">
            <div data-depth="0.10" class="layer">
                <div class="man wow slideInLeft"></div>
            </div>
            <div data-depth="0.20" class="layer">
                <div class="girl wow slideInRight"></div>
            </div>
        </div>
    </div>
</section>
<section id="feedback" class="feedback">
    <div class="space">
        <div id="fifth-scene" class="space__layers" data-friction-x="0.1" data-friction-y="0.1" data-scalar-y="12">
            <div data-depth="0.20" class="layer">
                <div class="saturn wow zoomIn" data-wow-delay=".5s"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="section-title">
            <?php the_field('feedback_title'); ?>
        </h2>
        <a class="rocket scrollto" href="#hero">
            <div class="rocket-icon wow slideInUp" data-wow-delay=".5s"></div>
        </a>
        <div class="feedback-wrap wow fadeInRight">
            <div class="feedback-container">
                <?php echo do_shortcode('[contact-form-7 id="11" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>

    <?php }
}
?>
<?php get_footer(); ?>