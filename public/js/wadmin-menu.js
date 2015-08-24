$(document).ready(function() {
	$('.side-menu-toggle').click(function() {
		var side = $(this).attr('data-side');
		var menu = $('#' + side + '-side-menu');
		if (menu.length == 1) {
			menu.addClass('show-for-small-medium');
			$('#cover-bg-menu').addClass('show');
		}
	});
	
	$('#cover-bg-menu').click(function() {
		$(this).removeClass('show');
		$('.side-menu').removeClass('show-for-small-medium');
	});
	
	$('.toggle-sub-menu').click(function(event) {
		if (!$(this).hasClass('toggled')) {
			$(this).removeClass('fa-chevron-down').addClass('fa-chevron-up toggled');
			$(this).closest('li').find('ul.sub-menu').addClass('toggled');
		} else {
			$(this).removeClass('fa-chevron-up toggled').addClass('fa-chevron-down');
			$(this).closest('li').find('ul.sub-menu').removeClass('toggled');
		}
		
		return false;
	});
});

//# sourceMappingURL=wadmin-menu.js.map