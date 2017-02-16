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

	// slick js

	$('.home-slider').slick({
		dots: true,
		centerMode: true,
		autoplay: true,
	  infinite: true,
		draggable: false,
		appendDots: '.banner-dots',
		autoplaySpeed: 4000,
		speed: 1000,
	});

	$('.home-mobile-slider').slick({
		dots: true,
		centerMode: true,
		slidesToShow: 1,
		autoplay: true,
	  infinite: true,
		draggable: true,
		appendDots: '.mobile-banner-dots',
		autoplaySpeed: 4000,
		speed: 1000,
	});

	$('.project-gallery').slick({
		dots: true,
		centerMode: true,
	  infinite: false,
	  slidesToShow: 3,
	  slidesToScroll: 1,
		variableWidth: true,
		draggable: false,
		appendDots: '.gallery-dots',
		appendArrows: '.gallery-arrows',
		initialSlide: 2,
		responsive: [
			{
				breakpoint: 2000,
				settings: {
					initialSlide: 1,
					slidesToShow: 2
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
					initialSlide: 0,
					slidesToShow: 1,
				}
			}
		]
	});

	if($('.project-gallery').length){
		var num_slides = $('.project-gallery').find('.slick-slide').length;
		if(num_slides < 4) {
			$('.project-gallery').addClass('small-slider');
		}
	}

	var $projectgallery = $('.project-gallery');
	$projectgallery.imagesLoaded( function() {
		$('.project-gallery').animate({opacity: 1}, 700);
	});

	var $homeslider = $('.home-slider');
	$homeslider.imagesLoaded( function() {
		$('.home-slider').animate({opacity: 1}, 700);
	});


	// slick for about page

	$('.publications').slick({
		centerMode: false,
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
		variableWidth: true,
		draggable: true,
		appendArrows: '.pub-arrows',
		responsive: [
			{
				breakpoint: 1280,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});

	if($('body').hasClass('page-template-about-page')){
		$('.slick-prev').html('<i class="fa fa-angle-left" aria-hidden="true"></i>');
		$('.slick-next').html('<i class="fa fa-angle-right" aria-hidden="true"></i>');
	}

	if($('body').hasClass('category')) {

		var $containerCat = $('#masonry-cat');

		$containerCat.imagesLoaded( function() {
			$('#masonry-cat').masonry({
				// options
				itemSelector: '.project'
			});
			$('#content').animate({opacity: 1}, 700);
		});

	}

	$('button.mobile-menu-button').funcToggle('click', function() {
		if($('html').width() <= '780') {
			$('.snipit').animate({
				height:'354px'
			}, 200);
		} else {
			$('.snipit').animate({
				height:'380px'
			}, 200);
		}
		$('.mobile-menu-button').toggleClass("open");
	},
	function() {
		$('.snipit').animate({
			height:'0px'
		}, 200);
		$('.mobile-menu-button').toggleClass("open");
	});

});
