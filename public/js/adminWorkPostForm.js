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
		content = $('.mce-edit-area iframe').contents().find('body').html();
		categories = [];
		$(':checked[name="categories[]"]').each(function(index) {
			categories.push($(this).val());
		});
		tags = $(':text[name="tags"]').val();
		form = $('.livepreview-form');
		form.children(':hidden[name="title"]').val(title);
		form.children(':hidden[name="content"]').val(content);
		form.submit();
	});
});




