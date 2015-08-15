@extends("../admin-layouts.mainAdmin")


@section("title")
Edit image post | 
@stop


@section("specific_css")
@stop


@section("specific_js_head")
{!! HTML::script("/js/adminImagePostForm.js") !!}
@stop


@section("body")

@include("admin-layouts.menuAdmin", array("link" => "imageposts", "has_sublink" => 1, "sublink" => "imageposts"))

<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-imageposts" class="container">
	{!! Form::model($post, array("route" => array("adminImagePostUpdate", $post->id), "method" => "patch", "class" => "imagepost-form")) !!}
		<h3 class="title">{!! HTML::linkRoute("adminImagePosts", "Image Posts") !!} <span class="fa fa-angle-right"></span> Edit</h3>
		<br />
		
		@include("admin.alertBox")
        
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
            		<p class="f-label">Image (cannot edit image)</p>

                    {!! HTML::image($post->image_url, "Image", array("class" => "post-image-edit")) !!}
            	</div>
            </div>
            
            <div class="small-12 medium-6 columns">
        		<div class="ui-block mg-b medium-half-mg-l">
        			{!! Form::label("caption", "Caption") !!}
		            {!! Form::textarea("caption", null, array("rows" => "5")) !!}
		            
		            <p class="text-date">Created : {!! date("M n, Y g:i A", strtotime($post->created_at)) !!}</p>
					@if ($post->updated_at != $post->created_at)
						<p class="text-date">Last updated : {!! date("M n, Y g:i A", strtotime($post->updated_at)) !!}</p>
					@endif
					
					<p class="text-date">{!! $post->hits !!} views</p>
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