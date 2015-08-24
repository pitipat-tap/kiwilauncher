@extends("../admin-layouts.main-admin")


@section("title")
{!! $post["title"] !!} (Live Preview) | 
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "blogposts", "has_sublink" => 1, "sublink" => "blogposts"))

<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-blogposts" class="container">
	<div class="post-preview">
	    <h3 class="title">{!! HTML::linkRoute("admin-blog-posts", "Blog Posts") !!} <span class="fa fa-angle-right"></span> Live Preview</h3>
	    <br />
	    
		<div class="post-block ui-block">
	        <h2 class="post-title">{!! $post["title"] !!}</h2>
			
			<hr />
			
			<div class="post-content">{!! $post["content"] !!}</div>
	    </div>
    </div>
</div>

@stop