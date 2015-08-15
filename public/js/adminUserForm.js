$(document).ready(function() {
	$('.fm-open').fancybox({
		width: 1024,
		height: 600,
		type: "iframe",
		autoSize: false,
		afterClose: function() {
			url = $(':text[name="profile_image"]').val();
			if (url!='') {
				$('#profile-image').attr('src', url);
			}
		}
	});
	
	$('#use-default-image').click(function(event) {
		$('#profile-image').attr('src', $("#profile-image").attr('data-default'));
		$(':text[name="profile_image"]').val("");
	});
});




