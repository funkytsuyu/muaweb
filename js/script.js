//jQuery scripts for the Oil and Sugar theme
jQuery(function($) {
	$(document).ready(function() {

		var $rotator = $(".slider");
		$rotator.find(".slide:gt(0)").hide();
		setTimeout(Rotate, 5000);

		function Rotate() {
			var $current = $rotator.find(".slide:visible");
			var $next = $current.next();
			if ($next.length === 0) $next = $rotator.find(".slide:eq(0)");
			$current.fadeOut(500);
			$next.fadeIn(500);
			setTimeout(Rotate, 5000);
		}
	});

	$(window).scroll(function() {
		if($('html').width() <= '780') {

		} else {
			if($('body').hasClass( "home" )) {
				if ($(this).scrollTop() > 620) {
					$("nav").addClass('sticky');
				} else {
					$("nav").removeClass('sticky');
				}
				$('.banner img').css({'opacity':( 100-($(window).scrollTop()/6) )/100});
			} else {
				if ($(this).scrollTop() > 320) {
					$("nav").addClass('sticky');
				} else {
					$("nav").removeClass('sticky');
				}
				$('.banner img').css({'opacity':( 100-($(window).scrollTop()/6) )/100});
			}
		}
	});

	// slick js

	$('.project-gallery').slick({
		dots: true,
		centerMode: true,
	  infinite: false,
	  slidesToShow: 3,
	  slidesToScroll: 1,
		variableWidth: true,
		draggable: true,
		appendDots: '.gallery-dots',
		appendArrows: '.gallery-arrows',
		initialSlide: 2,
		responsive: [
			{
				breakpoint: 2000,
				settings: {
					initialSlide: 1,
				}
			},
    	{
				breakpoint: 780,
				settings: {
					initialSlide: 0,
				}
			},
			{
				breakpoint: 480,
				settings: {

				}
			}
		]
	});

	var $projectgallery = $('.project-gallery');
	$projectgallery.imagesLoaded( function() {
		$('.project-gallery').animate({opacity: 1}, 700);
	});

	// slick for about page

	$('.publications').slick({
		dots: true,
		centerMode: false,
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
		variableWidth: true,
		draggable: true,
		appendDots: '.gallery-dots',
		appendArrows: '.gallery-arrows'
	});

	// isotope layout for project pages

	var $container = $('#masonry');
	// init
	$container.imagesLoaded( function() {
		$container.isotope({
			// options
			itemSelector: 'div',
			layoutMode: 'masonry'
		});
	});

	var $containerCat = $('#masonry-cat');
	// init
	$containerCat.imagesLoaded( function() {
		$containerCat.isotope({
			// options
			itemSelector: '.project',
			layoutMode: 'masonry'
		});
		$('#content').animate({opacity: 1}, 700);
	});


	$('button.mobile-menu-button').funcToggle('click', function() {
		$('.snipit').animate({
			height:'354px'
		}, 200);
		$('.mobile-menu-button-icon-open').animate({opacity: 1}, 500);
	},
	function() {
		$('.snipit').animate({
			height:'0px'
		}, 200);
		$('.mobile-menu-button-icon-open').animate({opacity: 0}, 500);
	});
});
