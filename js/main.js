jQuery(document).ready(function () {
    // Other
    jQuery('body').addClass('portfolio-page');

    // Preloader
    jQuery(".preloader").addClass('done');

    // Progress bar when scrolling
    window.onscroll = function() {scrollBar()};
    function scrollBar() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height    = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled  = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }

    // Mobile menu
    jQuery(".fa-bars").on('click', function () {
        jQuery(".mobile-menu").addClass('active');
    });

    jQuery(".fa-times, .mobile-menu .menu-item-type-custom a").on('click', function () {
        jQuery(".mobile-menu").removeClass('active');
    });

    jQuery('.mobile-menu .menu-item-has-children > a').on('click', function(e){
        e.preventDefault();
    });

    // Mobile submenu
    $('.mobile-menu .sub-menu').slideUp();
    
    $('.mobile-menu__nav .menu-item').on('click', function(e){
        $('.sub-menu').not($(this).find(".sub-menu")).slideUp();
        $('.mobile-menu__nav .menu-item').not($(this)).removeClass("active");

        $(this).find(".sub-menu").slideToggle();
        $(this).toggleClass("active");

        e.stopPropagation();
    });

    // Init wow effect
    new WOW().init();

    // Smooth scroll
    $('.scrollto > a').click( function(){ // ловим клик по ссылке с классом go_to
    var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
        $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
        }
        return false; // выключаем стандартное действие
    });

    // Tabs
    jQuery('ul.tabs__caption').on('click', 'li:not(.active)', function() {
        jQuery(this)
            .addClass('active').siblings().removeClass('active')
            .closest('.tabs').find('.tabs__content').removeClass('active').eq(jQuery(this).index()).addClass('active');
    });

	//Form
	var name  = jQuery('#name').val();
    var email = jQuery('#email').val();
    var phone = jQuery('#phone').val();

    if( name || email || phone){
        jQuery('label').addClass('active');
    }

	jQuery('input.form__input__name').on('click', function(){
		jQuery('.label__name').addClass('active');
	});

	jQuery('input.form__input__name').blur(function() {
	 if(!jQuery.trim(this.value).length) { // zero-length string AFTER a trim
	 	jQuery('.label__name').removeClass('active');
	 }
	});

	jQuery('input.form__input__tel').on('click', function(){
		jQuery('.label__tel').addClass('active');
	});

	jQuery('input.form__input__tel').blur(function() {
		if (jQuerythis.val() == '') {
			jQuerythis.removeClass('active');
		} else {
			jQuerythis.addClass('active');
		}
	});

	jQuery('input.form__input__email').on('click', function(){
		jQuery('.label__email').addClass('active');
	});

	jQuery('input.form__input__email').blur(function() {
 		if(!jQuery.trim(this.value).length) { // zero-length string AFTER a trim
 			jQuery('.label__email').removeClass('active');
 		}
 	});

	jQuery("#phone").mask("+380 (99) 999 99 99");

	jQuery.fn.setCursorPosition = function(pos) {
		if (jQuery(this).get(0).setSelectionRange) {
			jQuery(this).get(0).setSelectionRange(pos, pos);
		} else if (jQuery(this).get(0).createTextRange) {
			var range = jQuery(this).get(0).createTextRange();
			range.collapse(true);
			range.moveEnd('character', pos);
			range.moveStart('character', pos);
			range.select();
		}
	};

	jQuery("#phone").click(function(){
		jQuery(this).setCursorPosition(6);  
	});  
});

//# sourceMappingURL=main.min.js.map