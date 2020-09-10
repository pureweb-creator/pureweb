jQuery(document).ready(function () {

// Preloader
jQuery(".preloader").addClass('done');
// Other
jQuery('body').addClass('portfolio-page');

// START DARK THEME
var darkMode;

function onClickBox() {
  var checked=jQuery("#theme-swither").is(":checked");
  localStorage.setItem("checked", checked);
}

function onReady() {
  var checked="true"==localStorage.getItem("checked");
  jQuery("#theme-swither").prop('checked', checked);
  jQuery("#theme-swither").click(onClickBox);
}

jQuery(document).ready(onReady);

//for loading
var checked = JSON.parse(localStorage.getItem("theme-swither"));
document.getElementById("theme-swither").checked = true;

// Проверяем, если мы в принципе получили значение dark-mode
// Тогда записвыаем значение в переменную
// Если не получили, то записываем light и ничего не происходит, ибо ничего не срабатывает на light
if (localStorage.getItem('dark-mode')) {
  darkMode = localStorage.getItem('dark-mode');
} else {
  darkMode = 'light';
}
 // Устанавливаем значение, какое проверяем выше
localStorage.setItem('dark-mode', darkMode);


// Если получили нужно значение, то есть dark а не light, то ставим темную тему
if (localStorage.getItem('dark-mode') == 'dark') {
  // if the above is 'dark' then apply .theme_dark to the body
  jQuery('body.page-template-template-my-account').addClass('theme_dark');

  // setInterval(function() {
  //
  //   var currentHours = new Date().getHours()
  //   var body = document.querySelector('body')
  //   if (currentHours > 7 && currentHours < 20) {
  //     body.classList.remove('theme_dark');
  //     jQuery('#theme-swither').uncheck(;)
  //   } else {
  //     body.classList.add('theme_dark');
  //   }
  //
  // }, 1000)
}

// checkbox
jQuery('.checkbox-swither').on('click', function() {
  if( jQuery('#theme-swither').is(':checked') ){
    jQuery('body.page-template-template-my-account').addClass('theme_dark');
    // set stored value to 'dark'
    localStorage.setItem('dark-mode', 'dark');
  } else {
    jQuery('body.page-template-template-my-account').removeClass('theme_dark');
    // set stored value to 'light'
    localStorage.setItem('dark-mode', 'light');
  }
});
// END DARK THEME

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
jQuery('.mobile-menu .sub-menu').slideUp();

jQuery('.mobile-menu__nav .menu-item').on('click', function(e){
    jQuery('.sub-menu').not(jQuery(this).find(".sub-menu")).slideUp();
    jQuery('.mobile-menu__nav .menu-item').not(jQuery(this)).removeClass("active");

    jQuery(this).find(".sub-menu").slideToggle();
    jQuery(this).toggleClass("active");

    e.stopPropagation();
});

// Smooth scroll
jQuery('.scrollto > a').click( function(){ // ловим клик по ссылке с классом go_to
var scroll_el = jQuery(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
    if (jQuery(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
    jQuery('html, body').animate({ scrollTop: jQuery(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
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

// Show/Hide password
if(jQuery('.form-block-rcl__password')){
  jQuery('#primary-pass-user, #secondary-pass-user').after("<i class='rcli fa-eye show-pass'></i><i class='rcli fa-eye-slash hide-pass'></i>");
  var hidepass = jQuery('.hide-pass');
  var showpass = jQuery('.show-pass');
  hidepass.hide();
  showpass.on('click', function(){
    jQuery(this).parent().find('input').attr('type', 'text');
    jQuery(this).hide();
    jQuery(this).parent().find('.hide-pass').show();
  });
  hidepass.on('click', function(){
    jQuery(this).parent().find('input').attr('type', 'password');
    jQuery(this).hide();
    jQuery(this).parent().find('.show-pass').show();
  });
}

// discount
if(jQuery('.discount')){

  // Ключ localStorage
  var LS_KEY = 'modal_shown';

  // Если модал еще не открыали
  if (!sessionStorage.getItem(LS_KEY)) {
    setTimeout(function() {
      // Открываем модал
      jQuery('.discount').addClass('active');
    }, 3000);
  }

  jQuery('.discount .fa-times-circle').on('click', function(){
    jQuery('.discount').removeClass('active');
    // Сохраняем флаг в localStorage
    sessionStorage.setItem(LS_KEY, '1');
  });
}

//countdown
if(jQuery('.countdown')){
  // Set the date we're counting down to
  var countDownDate = new Date("Sep 31, 2020 23:59:59").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countdown").innerHTML = "EXPIRED";
    }
  }, 1000);
}

if(jQuery('.chat-form')){
  jQuery('.chat-form textarea').attr('placeholder', 'Напишите сообщение')
}

});

//# sourceMappingURL=main.min.js.map
