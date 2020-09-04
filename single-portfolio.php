<?php
/**
 * This template to display all single pages related to portfolio post type
 * @author: Roman Semenikhin
 *
 * @link https://codex.wordpress.org/
 *
 * @package pureweb
 */
get_header();
global $pureweb_redux;

while (have_posts()):
	the_post(); ?>

<section class="single-page">
	<div class="single-page__cover">
		<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "full", true); ?>" alt="post thumbnail" class="cover__img">
		<div class="cover__mask"></div>
	</div>
	<div class="container">
		<div class="single-page__grid single-portfolio-page__grid">
			<article class="single-page__article">
				<div class="article__info">
					<?php
					if ( get_post_meta(get_the_ID(), "views", true) ){ ?>
						<span class="views"><i class="fa fa-eye"></i><?php echo get_post_meta(get_the_ID(), "views", true); ?></span>
					<?php }
					?>
					<a href="<?php echo esc_url(get_day_link(false, false, false)); ?>" class="pubdate">
						<i class="fa fa-clock"></i>
						<?php the_date(); ?>
					</a>
				</div>
				<?php echo get_the_post_thumbnail(get_the_ID(), "full", $default_attr = array(
					'class' => "article__main-image"
				),true) ?>
				<h1 class="section-titles single-page__title">
					<?php echo "Услуга: "; the_title(); ?>
				</h1>

				<?php $deadline = get_field('deadline'); ?>

				<ul class="mask__info-block">
	        <?php if(get_field('deadline')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['time_icon']['url'] ?>" alt="Deadline icon" class="item__image" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Срок выполнения"); ?></span>
	            <span class="item__text">
	            <?php
	            if($deadline){
	                echo $deadline;

	                if ($deadline % 10 == 1){
	                    echo " день";
	                } else if ($deadline % 10 <= 4 && $deadline % 10 > 0){
	                    echo " дня";
	                } else if ($deadline % 10 >= 5 && $deadline % 10 <= 9 || $deadline % 10 == 0 ){
	                    echo " дней";
	                }
	            }
	            ?>
	            </span>
	        </li>
	        <?php } else { echo ''; } ?>

	        <?php if(get_field('price')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['price_icon']['url'] ?>" alt="Price icon" class="item__image" width="26px" height="26px" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Стоимость работы"); ?></span>
	            <span class="item__text"><?php the_field('price'); ?></span>
	        </li>
	        <?php } ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['task_icon']['url']; ?>" alt="Work Category Icon" class="item__image" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Категория"); ?></span>
	            <span class="item__text">
	            	<?php
	                // Вывод категории поста
	            	$cur_post_cat = get_the_terms(get_the_ID(), 'portfolio_cat');
	            	foreach ($cur_post_cat as $post_cat) {
	                    echo '<a href="'. esc_url(get_term_link( $post_cat->term_id )) .'">' . $post_cat->name . '</a>';
	                }
	            	?>
	            </span>
	        </li>
	        <?php if(get_field('mark_content')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['complexity_icon']['url'] ?>" alt="Complexity Icon" class="item__image" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Сложность"); ?></span>
	            <span class="item__text">
	               <?php
	               $stars_count = get_field('mark_content');
	               if($stars_count && $stars_count < 6 && $stars_count > 0){
	                   for($i = 0; $i < $stars_count; $i++){ ?>
	                       <i class="fa fa-star"></i>
	                   <?php }

	                   for($i = 0; $i < 5 - $stars_count; $i++){ ?>
	                       <i class="far fa-star"></i>
	                   <?php }
	               } ?>
	            </span>
	        </li>
	        <?php } ?>
	    </ul>
				<br>
	     	<!-- Проверка на существование ссылки у работы в портфолио -->
	      <?php $p_link_url = get_field('portfolio_link_address'); ?>
	      <?php if($p_link_url && $p_link_url != ""){ ?>
	          <a href="<?php echo esc_url($p_link_url); ?>">
	              <span><?php echo pll__("Ссылка на работу в интернете: ");  ?></span>
	              <?php echo '<span style="text-decoration: underline; color: red">'.esc_url($p_link_url).'</span>'; ?>
	          </a>
	      <?php } else { echo ''; } ?>
				<br><br>
				<div class="tags">
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
			<article class="single-page__article">
				<?php comments_template(); ?>
			</article>
			<article class="single-page__article">
				<div class="article__info" style="top: 0;">
					<br>
					<?php echo '<h2 class="sidebar__title">'.pll__("Похожие работы").'</h2>'; ?>
					<div class="page-sidebar__box page-sidebar__box--recent-posts">
					<?php
					$cur_cat       = get_the_terms(get_the_ID(), 'portfolio_cat');
					$cut_cat_stack = array();

					if($cur_cat):
						foreach ($cur_cat as $cat) {
							array_push($cut_cat_stack, $cat->slug);
						}
					endif;
					$recent_posts = new WP_Query(array(
						'posts_per_page' => '3',
						'post_type'      => 'portfolio',
						'orderby'        => 'rand',
						'tax_query'      => [
							'relation' => 'OR',
							[
								'taxonomy' => 'portfolio_cat',
								'field'    => 'slug',
								'terms'    => $cut_cat_stack
							]

						]
					));

					while ($recent_posts->have_posts()) {
						$recent_posts->the_post(); ?>
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
					}
					wp_reset_postdata(); ?>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>
<?php
endwhile;
get_footer(); ?>
