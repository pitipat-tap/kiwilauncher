@extends("../admin-layouts.main-admin")


@section("title")
Add New Image Post | 
@stop


@section("specific_css")
{!! HTML::style("/js/fancybox/source/jquery.fancybox.css", array("media" => "screen")) !!}
@stop


@section("specific_js_head")
{!! HTML::script("/js/tinymce/tinymce.min.js") !!}
{!! HTML::script("/js/fancybox/source/jquery.fancybox.pack.js") !!}
{!! HTML::script("/js/admin-image-post-form.js") !!}
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "imageposts", "has_sublink" => 1, "sublink" => "imageposts"))

<?php
	if(!isset($_SESSION)) {
		session_start(); 
	};;
	$_SESSION["USER_ROLE"] = Auth::user()->role;
	
	$lpath = getLinkPath();
?>


<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-imageposts" class="container">
	{!! Form::open(array("route" => "admin-image-post-create", "method" => "post", "class" => "imagepost-form")) !!}
		<h3 class="title">{!! HTML::linkRoute("admin-image-posts", "Image Posts") !!} <span class="fa fa-angle-right"></span> Add</h3>
		<br />
		
		@include("admin.alert-box")
        
        <div class="show-for-medium-up">
			{!! Form::button("Save", 
	            array(
	                "class" => "button", 
	                "type" => "submit", 
	                )
	            ) 
	        !!}
	        <br /><br />
        </div>
        
        <div class="row full-width">
        	<div class="small-12 medium-6 columns">
        		<div class="ui-block mg-b medium-half-mg-r">
            		<p class="f-label">Image</p>

                    {!! HTML::image("images/admin/icon-placeholder.svg", 
                        "Image", 
                        array(
                            "id" => "post-image",
                            "class" => "post-image-new"
                            )
                        )
                    !!}
                    {!! Form::text("image_url", 
                        null, 
                        array(
                            "id" => "image-url",
                            "class" => "image-url far-away",
                            "autocomplete" => "off",
                            "readonly" => "readonly"
                            ) 
                        ) 
                    !!}
                        
                    <p>
                    	<?php $p_link = "http://".$_SERVER['SERVER_NAME'].$lpath."/filemanager/dialog.php?type=1&field_id=image-url"; ?>
                    	<a class="fm-open" type="button" href="<?php echo $p_link; ?>">Select Image</a>
                    </p>
                    
                    <p class="text-date">Tips : Use image size > 600 x 315 pixels for Facebook link post with large preview image.</p>
            	</div>
            </div>
            
            <div class="small-12 medium-6 columns">
        		<div class="ui-block mg-b medium-half-mg-l">
        			{!! Form::label("caption", "Caption") !!}
		            {!! Form::textarea("caption", null, array("rows" => "5")) !!}
        		</div>
    		</div>
    	</div>
    	
    	<div class="small-button-group show-for-small-only">
        	{!! Form::button("Save", 
	            array(
	                "class" => "button", 
	                "type" => "submit", 
	                )
	            ) 
	        !!}
	        <br /><br />
        </div>
		
	{!! Form::close() !!}
</div>

@stop