$(document).ready(function() {
	$('.fm-open').fancybox({
		width: 900,
		height: 600,
		type: "iframe",
		autoSize: false,
		afterClose: function() {
			url = $(':text[name="image_url"]').val();
			if (url!='') {
				$('#post-image').attr('src', url);
			}
		}
	});
});





//# sourceMappingURL=admin-image-post-form.js.map