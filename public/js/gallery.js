var currentURL = window.location.href;

$(document).ready(function() {
	// ------------------------Dynamic grid layout------------------------
	var container = $('.gallery-image-posts').masonry({
		itemSelector: '.item',
	});
	
	container.imagesLoaded(function() {
  		container.masonry();
 	});
 	
 	
 	// ------------------------Popup------------------------
 	var image_popup = $('#image-popup');
 	var fb_plugins = image_popup.find('.fb-plugins');
 	var item_count = $('.gallery-image-posts .item').length;
 	var current_index = 0;
 	var post_full_url;
 	var extended_h = 720;
 	
 	// Open
 	$('.popup-open').click(function(event) {
		event.preventDefault();
		
		// Get data
		post_full_url = $(this).attr('href');
		var post_url = $(this).closest('.item').attr('data-url');
		var img_src = $(this).find('img').attr('src');
		var img_alt = $(this).find('img').attr('alt');
		current_index = $(this).closest('.item').index();
		checkItemIndex();
 
		$('body').css('overflow', 'hidden');
		image_popup.addClass('show');
 
		// AJAX
		$.ajax({
			url: currentURL + '/' + post_url,
	        method: 'POST',
	        dataType: 'json',
	        success: function(data, status, xhr) {
	        	// Success
	        },
	        error: function(xhr, status, error) {
				console.log(error);
			}
		});
 
 		// Set data
 		image_popup.find('.popup-content figure .image-link').attr('href', post_full_url);
		image_popup.find('.popup-content figure img').attr('src', img_src);
		image_popup.find('.popup-content figure figcaption').text(img_alt);
 
		image_popup.find('.popup-preloader').removeClass('show');
		image_popup.find('.popup-content, .popup-nav-small-medium').addClass('show');
		
		var updated_h = image_popup.find('.popup-container').outerHeight();
		image_popup.find('.popup-bg-close').css('height', updated_h + extended_h);
		image_popup.find('.image-link').attr('href', post_full_url);
		
		window.history.replaceState("obj", "Pop up", currentURL + '/' + post_url);
		
		addFacebookPlugins();
	});
	
	// Close
	$('.popup-close').click(function(event) {
		image_popup.removeClass('show');
		$('body').css('overflow', 'auto');
		
		removeFacebookPlugins();
		
		// Reset data
		image_popup.find('.popup-content figure .image-link').attr('href', '');
		image_popup.find('.popup-content figure img').attr('src', '');
		image_popup.find('.popup-content figure figcaption').empty();
		
		image_popup.find('.popup-preloader').addClass('show');
		image_popup.find('.popup-content, .popup-nav-small-medium').removeClass('show');
		
		window.history.replaceState("obj", "Pop up", currentURL);
	});
	
	// Prev/next
	$('.popup-change').click(function(event) {
		// Get data
		var post_item;
		
		if ($(this).attr('data-dir') == 'prev' && current_index > 0) {
			post_item = $('.gallery-image-posts .item').eq(current_index-1);
			if (post_item.length == 0) return false;
			current_index--;
		}
		else {
			post_item = $('.gallery-image-posts .item').eq(current_index+1);
			if (post_item.length == 0) return false;
			current_index++;
		}

		removeFacebookPlugins();
		checkItemIndex();
		
		post_full_url = post_item.find('a').attr('href');
		var post_url = post_item.attr('data-url');
		var img_src = post_item.find('img').attr('src');
		var img_alt = post_item.find('img').attr('alt');
		
		// AJAX
		$.ajax({
			url: currentURL + '/' + post_url,
	        method: 'POST',
	        dataType: 'json',
	        success: function(data, status, xhr) {
	        	// Success
	        },
	        error: function(xhr, status, error) {
				console.log(error);
			}
		});
		
		// Set data
		image_popup.find('.popup-content figure .image-link').attr('href', post_full_url);
		image_popup.find('.popup-content figure img').attr('src', img_src);
		image_popup.find('.popup-content figure figcaption').text(img_alt);
		
		var updated_h = image_popup.find('.popup-container').outerHeight();
		image_popup.find('.popup-bg-close').css('height', updated_h + extended_h);
		
		window.history.replaceState("obj", "Pop up", currentURL + '/' + post_url);
		
		addFacebookPlugins();
	});
	
	// Resize for scrolling
	$(window).resize(function(event) {
		if (image_popup.hasClass('show')) {
			var updated_h = image_popup.find('.popup-container').outerHeight();
			image_popup.find('.popup-bg-close').css('height', updated_h + extended_h);
		}
	});
	
	function checkItemIndex() {
		if ($('.popup-icon-prev, .popup-icon-next').hasClass('hidden')) {
			$('.popup-icon-prev, .popup-icon-next').removeClass('hidden');
		}
		if (current_index == 0) {
			$('.popup-icon-prev').addClass('hidden');
		}
		else if (current_index == item_count-1) {
			$('.popup-icon-next').addClass('hidden');
		}
	}
	
	function addFacebookPlugins() {
		fb_plugins.append('<div class="fb-like" ' + 
			'data-layout="button_count"' + 
			'data-action="like"' + 
			'data-share="true" ' + 
			'data-href="' + post_full_url + '">' + 
		'</div>');
		fb_plugins.append('<div class="fb-send" ' + 
			'data-colorscheme="light"' + 
			'data-href="' + post_full_url + '">' + 
		'</div>');
		fb_plugins.append('<div class="fb-comments" ' + 
			'data-numposts="5"' + 
			'data-colorscheme="light"' + 
			'data-width="100%" ' + 
			'data-href="' + post_full_url + '">' + 
		'</div>');
		
		// FB.XFBML.parse();
	}
	
	function removeFacebookPlugins() {
		fb_plugins.empty();
				
		// FB.XFBML.parse();
	}
});


