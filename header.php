<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pureweb
 */
global $pureweb_redux;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900&display=swap" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="194x194" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-194x194.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/img/favicons/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="theme-color" content="#A70FF9">
    
	<!-- Open Graph Protocol -->
    <meta property="og:title" content="Главная / Pureweb">
	<meta property="og:description" content="Лендинг, сайт под ключ, сайт-визитка">
	<meta property="og:type" content="article">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/screenshot.png">
	<meta property="og:site_name" content="Pureweb">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<!-- Сritical page styles. -->
    <style>
        h3{line-height: 1.5em !important;}.blog-article ul:not(.blocks-gallery-grid){padding-left: 40px;}
	    @font-face{font-family:'Lato Regular';font-weight:400;src:url(<?php echo  get_template_directory_uri(); ?>/fonts/Lato-Regular.ttf) format("truetype")}@font-face{font-family:'Lato Black';font-weight:700;src:url(<?php echo  get_template_directory_uri(); ?>/fonts/Lato-Bold.ttf) format("truetype")}a,body,h1,h2,h3,h4,h5,h6,li,p,ul{margin:0;padding:0}ul li{list-style:none}img{max-width:100%}*,::after,::before{-webkit-box-sizing:border-box;box-sizing:border-box}body,html{overflow-x:hidden}button,input,textarea{outline:0}a{text-decoration:none}body{font-family:'Lato Regular', Arial, sans-serif;color:#333;font-size:14px;color:#312de7;overflow-x:hidden;background:#f4f4f4}h1,h2,h3,h4,h5,h6{font-family:Oswald, Arial,sans-serif;text-transform:uppercase;font-weight:700}.fa-phone{-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}.justify-content-between{-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between}.justify-content-center{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.mobile-menu{overflow-y: scroll; width:100%;opacity:0;-webkit-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease;height:100%;position:fixed;background:-o-linear-gradient(315deg,#3023ae 0,#c86dd7 100%);background:linear-gradient(135deg,#3023ae 0,#c86dd7 100%);z-index:999;color:#fff;visibility:hidden}.mobile-menu .heading{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;text-align:center;padding-top:10%}.mobile-menu .heading .fa-times{width:30px;height:30px;background:#fff;color:#000;line-height:30px;border-radius:100px;margin:0 25px 10px auto}.mobile-menu .heading .contact_info{padding-left: 25px; padding-top: 20px; border-top: 1px solid #e9e9e9; margin-top: 20px;}.mobile-menu .heading .contact_info *{margin:5px 0}.mobile-menu .heading .contact_info .contact__mail{display: block; text-align: left;} .mobile-menu a{text-align: left; color:#fff;display:block}.mobile-menu__nav{display:block!important}.mobile-menu__nav>ul{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}.mobile-menu__nav>ul li{margin:5px 0; padding-left: 25px;}.active{z-index: 999999999;visibility:visible;opacity:1;-webkit-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease}.preloader{width:100%;height:100%;background:-o-linear-gradient(315deg,#3023ae 0,#c86dd7 100%);background:linear-gradient(135deg,#3023ae 0,#c86dd7 100%);display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;-ms-flex-align:center;align-items:center;position:fixed;z-index:999;top:0;left:0}.done{visibility:hidden;opacity:0;top:-200px}.d-flex{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.container{width:1224px;margin:0 auto;position:relative;z-index:3}.btn{border:none;font-family:Lato,sans-serif;background:#f55218;color:#fff;font-weight:700;-webkit-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease;padding:15px 64px;font-size:16px;border-radius:26px;cursor:pointer}.btn:hover{-webkit-box-shadow:0 4px 40px rgba(245,82,24,.51);box-shadow:0 4px 40px rgba(245,82,24,.51)}.section-title{text-transform:uppercase;font-size:36px}.universe{-webkit-animation-duration:3s;animation-duration:3s;position:absolute;top:0;right:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);z-index:0}.universe__layers{position:relative;top:0;left:0;width:990px;height:835px}.universe__layers .layer{width:100%;height:100%}.universe__layers .layer div{background-repeat:no-repeat;position:absolute;background-size:contain}.hero{color:#312de7;padding-top:20px;min-height:835px;position:relative;}.hero .heading{position:relative;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;z-index:2}.hero .heading .logo{margin-right:77px;}.logo{width: 50px;}.hero .heading .contact_info{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.hero .heading .contact_info .contact__phone{margin-right:30px}.hero .heading .contact_info i{font-size:12px}.hero .heading .contact_info i.fa.fa-phone{-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}.hero .heading .fa.fa-bars{margin-top:15px;display:none}.hero .heading .nav{margin-left:auto}.hero .heading .nav ul li{-webkit-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease;padding:5px 15px;margin-right:7px;border:1px solid transparent;border-radius:100px}.hero .heading .nav ul li:last-child{margin-right:0}.hero .heading .nav ul li:hover{border-color:#312de7}.hero .heading .nav ul li a{color:#312de7}.hero .offer{margin-top:243px}.hero .offer__title_menu{margin-bottom:15px}.hero .offer__title_menu li{margin-right:25px;position:relative}.hero .offer__title_menu li::after{position:absolute;font-family:"Font Awesome 5 Free";font-weight:900;content:"\f005";font-size:9px;line-height:10px;right:-17.5px;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.hero .offer__title_menu li:last-child::after{display:none}.hero .offer__title_main{margin-bottom:15px;font-size:48px;line-height:1.5em;position:relative}.hero .offer__title_main span{position:absolute;left:0;-webkit-text-stroke:1px #312de7;color:transparent;left:-2px;top:2px}.hero .offer__title_excerpt{font-size:15px;width:320px;margin-bottom:46px}.hero .universe__layers>*{background-size:contain}.hero .universe__layers .layer .bg{background:url(<?php echo get_template_directory_uri() ?>/img/main-bg.svg) no-repeat left center/100% 100%;width:100%;-webkit-transform:scale(1.5);-ms-transform:scale(1.5);transform:scale(1.5);height:100%;top:15%;right:13%}.hero .universe__layers .layer .girl{background:url(<?php echo get_template_directory_uri() ?>/img/girl.svg) no-repeat center;width:351px;height:417px;bottom:25%;left:7%}.hero .universe__layers .layer .mens{background:url(<?php echo get_template_directory_uri() ?>/img/mens.svg) no-repeat center/contain;width:500px;height:450px;bottom:15%;right:0}.hero .universe__layers .layer .screen{background:url(<?php echo get_template_directory_uri() ?>/img/screen.svg) no-repeat center/contain;width:500px;height:450px;bottom:45%;right:0}
	</style>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php if(is_page_template('template-blog-archive-page.php')): ?> style="background: url(<?php echo esc_url(the_field('bg_image')); ?>) repeat center top;" <?php endif; ?> >
<div class="progress">
    <div class="progress__bar" id="myBar"></div>
</div>
<div class="mobile-menu">
    <div class="heading d-flex">
        <i class="fas fa-times"></i>
        <nav class="mobile-menu__nav nav">
            <?php
                if(is_front_page()){
                    wp_nav_menu(array(
                        'theme_location'  => 'menu-1',
                        'menu'            => '',
                        'container'       => false,
                        'menu_class'      => 'menu d-flex',
                    ));
                } else {
                    wp_nav_menu(array(
                        'theme_location'  => 'menu-2',
                        'menu'            => '',
                        'container'       => false,
                        'menu_class'      => 'menu d-flex',
                    ));
                }
            ?>
            <?php
            
            ?>
        </nav>
        <div class="contact_info">
            <a href="tel:<?php echo $pureweb_redux['phone_number']; ?>" class="contact__phone"><i class="fa fa-phone"></i> <?php echo $pureweb_redux['phone_number']; ?></a>
            <span class="contact__mail"><i class="fa fa-envelope"></i> <?php echo $pureweb_redux['email'] ?></span>
        </div>
    </div>
</div>
<div class="preloader"><img src="<?php echo get_template_directory_uri(); ?>/img/puff.svg" alt="page-preloader"></div>
<?php
if(is_front_page()){ ?>
<header id="hero" class="hero">
    <div class="container">
        <div class="heading d-flex">
            <a href="<?php echo esc_url(get_home_url("/")) ?>" class="logo">
                <img src="<?php echo $pureweb_redux['home-logo']['url']; ?>" alt="home logo">
            </a>
            <div class="contact_info">
                <a href="tel:<?php echo $pureweb_redux['phone_number']; ?>" class="contact__phone"><i class="fa fa-phone"></i> <?php echo $pureweb_redux['phone_number']; ?></a>
                <span class="contact__mail"><i class="fa fa-envelope"></i> <?php echo $pureweb_redux['email']; ?></span>
            </div>
            <i class="fa fa-bars"></i>
            <nav class="nav">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'menu-1',
                    'menu'            => '',
                    'container'       => false,
                    'menu_class'      => 'menu d-flex',
                ));
                ?>
            </nav>
        </div>
    </div>
    <div class="offer">
        <div class="container">
            <div class="offer__title">
                <nav class="wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.1s">
                    <?php
                    	$services = get_terms('portfolio_cat');
                    	echo '<ul class="offer__title_menu d-flex">';
                    	foreach ($services as $services_item) { ?>
                    		<li><a href="<?php echo get_term_link($services_item->term_id, $services_item->taxonomy); ?>"><?php echo $services_item->name; ?></a></li>
                    	<?php }
                    	echo '</ul>';
                    ?>
                </nav>
                <h1 class="offer__title_main wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                    <?php if(is_front_page()){ echo the_title(); } ?>
                    <span>
                         <?php if(is_front_page()){ echo the_title(); } ?>
                    </span>
                </h1>

                   <?php
                   if(have_posts()){
                       while(have_posts()){
                           the_post(); ?>
                           <div class="offer__title_excerpt wow bounceInLeft" data-wow-duration="1.5s" data-wow-delay="0.4s">
                               <?php echo the_content(); ?>
                           </div>
                       <?php }
                   }
                   ?>
                <a href="#feedback" class="btn offer__title_btn wow bounceInLeft scrollto" style="display: inline-block" data-wow-delay=".5s" data-wow-duration="2s"><?php the_field('button_text'); ?></a>
            </div>
        </div>
    </div>
    <div class="universe wow">
        <div id="first-scene" class="universe__layers" data-friction-x="0.1" data-friction-y="0.1" data-scalar-y="12">
            <div data-depth="0.0" class="layer">
                <div class="bg wow fadeIn"></div>
            </div>
            <div data-depth="0.30" class="layer">
                <div class="girl wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div data-depth="0.10" class="layer">
                <div class="screen wow fadeIn" data-wow-delay=".7s"></div>
            </div>
            <div data-depth="0.70" class="layer">
                <div class="mens wow fadeIn" data-wow-delay=".7s"></div>
            </div>
        </div>
    </div>
</header>
<?php } else { ?>
<header id="hero" class="hero">
    <div class="container">
        <div class="heading d-flex">
            <a href="<?php echo esc_url(get_home_url("/")) ?>" class="logo"><img src="<?php echo $pureweb_redux['home-logo']['url']; ?>" alt="home logo"></a>
            <div class="contact_info">
                <a href="tel:<?php echo $pureweb_redux['phone_number']; ?>" class="contact__phone"><i class="fa fa-phone"></i> <?php echo $pureweb_redux['phone_number']; ?></a>
                <span class="contact__mail"><i class="fa fa-envelope"></i> <?php echo $pureweb_redux['email']; ?></span>
            </div>
            <i class="fa fa-bars"></i>
            <nav class="nav">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'menu-2',
                    'menu'            => '',
                    'container'       => false,
                    'menu_class'      => 'menu d-flex',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>
<?php } ?>
