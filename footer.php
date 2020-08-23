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
<?php wp_footer(); ?>
<script type="text/javascript" src="https://spikmi.com/Widget?Id=3635"></script>
<?php if(is_front_page()): ?>
<script>
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
