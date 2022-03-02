/*! CUSTOM JS | */
(function($) {
    'use strict';
	let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
    
    mainNav.classList.toggle('active');});



            $(window).on('scroll', function() {
            if ($(window).scrollTop() > 200) {
                $('.navbar').addClass('menu-bg');
            } else {
                $('.navbar').removeClass('menu-bg');
            }
        });


    })(jQuery);