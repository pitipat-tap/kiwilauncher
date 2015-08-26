@extends("../admin-layouts.main-admin")


@section("title")
Image posts | 
@stop


@section("specific_js_head")
{!! HTML::script("/js/admin-image-posts.js") !!}
@stop


<?php
use Chromabits\Pagination\FoundationPresenter;
?>


@section("body")

@include("admin-layouts.menu-admin", array("link" => "imageposts", "has_sublink" => 1, "sublink" => "imageposts"))

<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
    <div class="small-6 columns align-right">
    	<a class="link-icon mg-r" href="{!! URL::route('admin-image-post-new') !!}">
    		<span class="fa fa-plus"></span>
    	</a>
    </div>
</div>

<div id="admin-imageposts" class="container">
	<h3 class="title">Image Posts</h3>
	<br />
	
	@include("admin.alert-box")
	
	<div class="show-for-large-up">
		{!! HTML::linkRoute("admin-image-post-new", "Add Post", [], array("class" => "button")) !!}
		<br /><br />
	</div>
	
	@if (Input::get("author") != null || 
		Input::get("tag") != null
		)
		<div>
			@if (Input::get("author") != null)
				<p>Author : {!! Input::get("author") !!}</p>
			@elseif (Input::get("tag") != null)
				<p>Tag : {!! Input::get("tag") !!}</p>
			@endif
			
			<p>({!! HTML::linkRoute("admin-image-posts", "View all data") !!})</p>
			<br />
		</div>
	@endif
	
	<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
		@foreach ($posts as $post)
			<li>
				<div class="imagepost-item ui-block ui-card no-pd">
					<p class="post-image">{!! HTML::image($post->image_url) !!}</p>
					<div class="post-details">
						<p>
							@if (!$post->is_featured)
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-image-post-togglefeatured', array($post->id)) !!}" title="Set Featured">
										<span class="tf-icon fa fa-star"></span>
									</a>
								@endif
							@else
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-image-post-togglefeatured', array($post->id)) !!}" title="Unset Featured">
										<span class="tf-icon featured fa fa-star"></span>
									</a>
								@else
									<span class="tf-icon featured fa fa-star"></span>
								@endif
							@endif
						</p>
						
						<p class="show-for-large-up">
							By 
							{!! HTML::linkRoute("admin-image-posts", $post->author->username, 
							array("author" => $post->author->username)) !!}
						</p>
						
						@if ($post->tags()->count() > 0)
							<p class="show-for-large-up">
								Tags : 
								@foreach ($post->tags as $tag)
									{!! HTML::linkRoute("admin-image-posts", $tag->name, array("tag" => $tag->name)) !!} 
								@endforeach
							</p>
						@endif
						
						<p class="text-date show-for-large-up">Created : {!! date("M n, Y g:i A", strtotime($post->created_at)) !!}</p>
						@if ($post->updated_at != $post->created_at)
							<p class="text-date show-for-large-up">Last updated : {!! date("M n, Y g:i A", strtotime($post->updated_at)) !!}</p>
						@endif
						
						<p class="text-date">{!! $post->hits !!} views</p>
						
						<div class="row">
							<div class="small-6 columns">
								@if (Auth::user()->role == "admin" || Auth::user()->id == $post->author->id)
									{!! HTML::linkRoute("admin-image-post-edit", "Edit", 
										array($post->id), 
										array("class" => "card-button"))
									!!}
								@else
									<span class="card-button disabled">Edit</span>
								@endif
							</div>
							<div class="small-6 columns">
								@if (Auth::user()->role == "admin" || Auth::user()->id == $post->author->id)
									<a class="card-button end" data-reveal-id="delete-modal-id-{!! $post->id !!}">Delete</a>
									<div id="delete-modal-id-{!! $post->id !!}" class="reveal-modal tiny" data-reveal>
										<h4>Confirm delete</h4>
										{!! Form::open(array("route" => array("admin-image-post-delete", $post->id), "method" => "delete")) !!}
											{!! Form::button("Delete", array("type" => "submit")) !!}
										{!! Form::close() !!}
										<a class="close-reveal-modal">&#215;</a>
									</div>
								@else
									<span class="card-button end disabled">Delete</span>
								@endif
							</div>
						</div>
					</div>
				</div>
			</li>
		@endforeach
	</ul>
	
	@if ($posts->total() > $posts->perPage())
		<div class="pagination-container">
			{!! str_replace('/?', '?', $posts->appends(Request::except("page"))->render(new FoundationPresenter($posts))) !!}
		</div>
	@endif
</div>

@stop

