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
					<?php echo pll__("Услуга") . ": " . get_the_title(); ?>
				</h1>

				<div class="portfolio__work-description">
					<?php the_content(); ?>
				</div>

				<!-- Вывод полей зааданных из админки -->
				<?php $deadline = get_field('deadline');?>
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

				<!-- Вывод полей, заданных из профиля пользователя -->
				<?php $deadline_user_profile = get_post_meta(get_the_ID(), 'pureweb-case-deadline'); ?>
				<ul class="mask__info-block">
	        <?php if(get_post_meta(get_the_ID(), 'pureweb-case-deadline')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['time_icon']['url'] ?>" alt="Deadline icon" class="item__image" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Срок выполнения"); ?></span>
	            <span class="item__text">
	            <?php
	            if($deadline_user_profile){
	                echo $deadline_user_profile;

	                if ($deadline_user_profile % 10 == 1){
	                    echo " день";
	                } else if ($deadline_user_profile % 10 <= 4 && $deadline_user_profile % 10 > 0){
	                    echo " дня";
	                } else if ($deadline_user_profile % 10 >= 5 && $deadline_user_profile % 10 <= 9 || $deadline_user_profile % 10 == 0 ){
	                    echo " дней";
	                }
	            }
	            ?>
	            </span>
	        </li>
	        <?php } else { echo ''; } ?>

					<?php if(get_post_meta(get_the_ID(), 'pureweb-case-costs')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['price_icon']['url'] ?>" alt="Price icon" class="item__image" width="26px" height="26px" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Стоимость работы"); ?></span>
	            <span class="item__text"><?php echo get_post_meta(get_the_ID(), 'pureweb-case-costs')[0]; ?></span>
	        </li>
	        <?php } ?>

					<?php if(get_post_meta(get_the_ID(), 'pureweb-case-rating')){ ?>
	        <li class="mask__info-item">
	            <img src="<?php echo $pureweb_redux['complexity_icon']['url'] ?>" alt="Complexity Icon" class="item__image" width="26px" height="26px">
	            <span class="item__name"><?php echo pll__("Сложность"); ?></span>
	            <span class="item__text">
	               <?php
	               $stars_count = get_post_meta(get_the_ID(), 'pureweb-case-rating')[0];
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
	      <?php
				$p_link_url = get_field('portfolio_link_address');
				$p_link_url_user_profile = get_post_meta(get_the_ID(), 'pureweb-case-link');
	      if($p_link_url){ ?>
	          <a href="<?php echo esc_url($p_link_url); ?>">
	              <span><?php echo pll__("Ссылка на работу в интернете: ");  ?></span>
	              <?php echo '<span style="text-decoration: underline; color: red">'.esc_url($p_link_url).'</span>'; ?>
	          </a>
	      <?php } else if($p_link_url_user_profile): ?>
					<a href="<?php echo esc_url($p_link_url_user_profile[0]); ?>">
							<span><?php echo pll__("Ссылка на работу в интернете: ");  ?></span>
							<?php echo '<span style="text-decoration: underline; color: red">'.esc_url($p_link_url_user_profile[0]).'</span>'; ?>
					</a>
				<?php endif; ?>
				<br><br>

				<!-- Tag Cloud -->
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
		</div>
	</div>
</section>
<?php
endwhile;
get_footer(); ?>
