$(document).ready(function() {
	$('.fm-open').fancybox({
		width: 900,
		height: 600,
		type: "iframe",
		autoSize: false,
		afterClose: function() {
			url = $(':text[name="feature_image_url"]').val();
			if (url!='') {
				$('#feature-image').attr('src', url);
			}
		}
	});
	
	$('.livepreview').click(function(event) {
		title = $(':text[name="title"]').val();
		description = $('textarea[name="description"]').val();
		feature_url = $(':text[name="feature_image_url"]').val();
		categories = [];
		$(':checked[name="categories[]"]').each(function(index) {
			categories.push($(this).val());
		});
		tags = $(':text[name="tags"]').val();
		form = $('.livepreview-form');
		form.children(':hidden[name="title"]').val(title);
		form.children(':hidden[name="description"]').val(description);
		form.children(':hidden[name="feature_url"]').val(feature_url);
		form.submit();
	});
});




