@extends("../admin-layouts.main-admin")


@section("title")
{!! $post["title"] !!} (Live Preview) | 
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "workposts", "has_sublink" => 1, "sublink" => "workposts"))

<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-blogposts" class="container">



	<div class="post-preview">
	    <h3 class="title">{!! HTML::linkRoute("adminWorkPosts", "Work Posts") !!} <span class="fa fa-angle-right"></span> Live Preview</h3>
	    <br />

	    {!! HTML::image($post["feature_image_url"]) !!}
	    
		<div class="post-block ui-block">
	        <h2 class="post-title"> title: {!! $post["title"] !!}</h2>
			<p> link_URL: {!! $post["link_url"] !!}</p>
			<hr/>
			<p> description: {!! $post["description"] !!}</p>
			@for($i = 0; $i < 5; $i++)
				@if($post["screenshotsURL".$i] != '')
					<p> link_URL: {!! $post["screenshotsURL".$i] !!}</p>
				@endif
			@endfor
	    </div>
    </div>
</div>

@stop