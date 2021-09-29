// Loader
$(window).on('load', function() {
  $('.loader__wrapper').hide();
});

// Animar scroll no menu âncora
$('.header__nav--list a[href^="#"]').on('click', function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
  targetOffset = $(id).offset().top;
    
  $('html, body').animate({ 
    scrollTop: targetOffset - 100
  }, 500);
});
$(window).on('scroll', function(){
  if ($(window).scrollTop() < 100) {
    $('.header').removeClass('nav-top');
  } else {
    $('.header').addClass('nav-top');
  }
});

// Animações de entrada
import WOW from "wow.js";
var wow = new WOW(
  {
    offset: 50,  
  }
);
wow.init();

// Toggle do menu mobile
$('.header__toggle').on('click', function(){
  $(this).toggleClass('is-open');
  $('.header__nav').toggleClass('is-open');
  $('.header').toggleClass('is-open');
  $('body').toggleClass('menu-is-open');  
});



$('.header__nav--list li a').on('click', function(){
  $('.header__nav').removeClass('is-open');
  $('.header').removeClass('is-open');
  $('body').removeClass('menu-is-open');  
});
