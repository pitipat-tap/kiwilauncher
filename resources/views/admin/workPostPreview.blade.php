@extends("../admin-layouts.main-admin")


@section("title")
{!! $post->title !!} (Preview) | 
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
		<h3 class="title">{!! HTML::linkRoute("adminWorkPosts", "Work Posts") !!} <span class="fa fa-angle-right"></span> Preview</h3>
		<br />
		
		<div class="medium-button-group show-for-medium-up">
			{!! HTML::linkRoute("adminWorkPostEdit", "Edit", 
				array($post->id), 
				array("class" => "button mg-r"))
			!!}
			<a class="button secondary" data-reveal-id="delete-modal-id-<? echo $post->id; ?>">Delete</a>
			<br /><br />
		</div>
		
		<div class="post-block ui-block mg-b">
			{!! HTML::image($post->feature_image_url) !!}

	        <h2 class="post-title">{!! $post->title !!}</h2>
					
			@if ($post->is_featured)
				<p class="post-featured-label">
					<span class="icon fa fa-star"></span> Featured post
				</p>
			@endif
			
			<p class="text-date">{!! date("M n, Y g:i A", strtotime($post->created_at)) !!}</p>
			
			<hr />
			
			<div class="post-content">{!! $post->description !!}</div>
			
			@if ($post->updated_at != $post->created_at)
				<p class="text-date">Last updated : {!! date("M n, Y g:i A", strtotime($post->updated_at)) !!}</p>
			@endif
	    </div>
	    
	    <div class="small-button-group show-for-small-only">
        	{!! HTML::linkRoute("adminWorkPostEdit", "Edit", 
				array($post->id), 
				array("class" => "button"))
			!!}
			<br />
			
			<a class="button secondary" data-reveal-id="delete-modal-id-<? echo $post->id; ?>">Delete</a>
	        <br /><br />
        </div>
	</div>
</div>

<div id="delete-modal-id-<?php echo $post->id; ?>" class="reveal-modal tiny" data-reveal>
	<h4>Confirm delete</h4>
	<p>"{!! $post->title !!}"</p>
	{!! Form::open(array("route" => array("adminWorkPostDelete", $post->id), "method" => "delete")) !!}
		{!! Form::hidden("inpreview", "1") !!}
        {!! Form::button("Delete", array("type" => "submit")) !!}
    {!! Form::close() !!}
    <a class="close-reveal-modal">&#215;</a>
</div>

@stop