/*! CUSTOM JS | */
(function($) {
    'use strict';
	let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
    
    mainNav.classList.toggle('active');});

	let repMenu = document.getElementById('js-rep-menu');
let repButt = document.getElementById('js-rep-butt');

repButt.addEventListener('click', function () {
    
    repMenu.classList.toggle('rep-active');});


    })(jQuery);