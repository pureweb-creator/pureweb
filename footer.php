<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pureweb
 */
global $pureweb_redux;
?>
<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__in d-flex">
            <a href="<?php echo esc_url(get_home_url("/")) ?>" class="logo">
              <?php if($pureweb_redux['home-logo']): ?>
                <img src="<?php echo $pureweb_redux['home-logo']['url']; ?>" alt="footer logo">
              <?php else: echo bloginfo('name'); endif; ?>
            </a>
            <div class="contact_info">
              <a href="tel:<?php echo $pureweb_redux['phone_number']; ?>" class="contact__phone"><i class="fa fa-phone"></i> <?php echo $pureweb_redux['phone_number']; ?></a>
              <span class="contact__mail"><i class="fa fa-envelope"></i> <?php echo $pureweb_redux['email']; ?></span>
            </div>
        </div>
    </div>
</footer>
<div class="discount">
  <div class="discount__top-line d-flex">
    <i class="fal fa-times-circle"></i>
    <span class="discount__amout"><?php echo pll__("Скидки до -30%"); ?></span>
  </div>
  <h4 class="discount__title"><?php echo pll__("Успейте заказать сайт до 31 Сентября!"); ?>"</h4>
  <p class="discount__text"><?php echo pll__("Забронируйте разработку сайта до 31.09 и получите горячую скидку -30%!"); ?></p>
  <button type="button" name="button" class="discount__btn"><a href="#modal"><?php echo pll__("Заказать сайт!"); ?></a> </button>
</div>


<div class="remodal order-site" data-remodal-id="modal">
  <div class="mask"></div>
  <button data-remodal-action="close" class="remodal-close"> <i class="fal fa-times"></i> </button>
  <h3 class="order-site__title"><?php echo pll__("Заказать сайт <br> со скидкой В -30%"); ?></h3>
  <p class="order-site__caption">
    <?php echo pll__("Измените свой бизнесс в лучшую сторону уже сейчас"); ?>
  </p>
  <?php
  // Comment form
  echo strip_tags(do_shortcode('[contact-form-7 id="576" title="Discount Form"]'), '<form>, <input>, <label>, <i>, <div>');
  ?>
  <div class="countdown-box">
    <p><?php echo pll__("До конца акции осталось"); ?></p>
    <div id="countdown"></div>
  </div>
</div>
<?php wp_footer(); ?>
<?php if(!is_page_template('template-my-account.php')): ?>
<script type="text/javascript" src="https://spikmi.com/Widget?Id=3635"></script>
<?php endif; ?>
<?php if(is_front_page()): ?>
<script>
    jQuery("#phone").mask("+380 (99) 999 99 99");
    new WOW().init();
    jQuery(document).ready(function () {
       // Parallax
        var scene = document.getElementById('first-scene');
        var parallaxInstance = new Parallax(scene);

        var scene2 = document.getElementById('second-scene');
        var parallaxInstance = new Parallax(scene2);

        var scene3 = document.getElementById('third-scene');
        var parallaxInstance = new Parallax(scene3);

        var scene4 = document.getElementById('fourth-scene');
        var parallaxInstance = new Parallax(scene4);

        var scene5 = document.getElementById('fifth-scene');
        var parallaxInstance = new Parallax(scene5);
    });
</script>
<?php endif; ?>
</body>
</html>
