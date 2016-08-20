tinymce.init({
    selector: "textarea.tinymce",
    plugins: [
        "advlist autolink link image lists charmap hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor",
    image_advtab: true,
    relative_urls: false,
    remove_script_host: false,
    //external_filemanager_path:"http://"+window.location.hostname+"/kiwilauncher/public/filemanager/",
    // Real server
    external_filemanager_path:"http://"+window.location.hostname+"/filemanager/",
	filemanager_title:"File manager",
	//external_plugins: { "filemanager" : "http://"+window.location.hostname+"/kiwilauncher/public/filemanager/plugin.min.js"}
	// Real server
	external_plugins: { "filemanager" : "http://"+window.location.hostname+"/filemanager/plugin.min.js"}
});

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





//# sourceMappingURL=admin-blog-post-form.js.map
