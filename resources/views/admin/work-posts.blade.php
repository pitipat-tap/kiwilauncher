@extends("../admin-layouts.main-admin")


@section("title")
Work Posts | 
@stop


@section("specific_js_head")

@stop


<?php
use Chromabits\Pagination\FoundationPresenter;
?>


@section("body")

@@include("admin-layouts.menu-admin", array("link" => "workposts", "has_sublink" => 0, "sublink" => ""));

<nav id="right-side-menu" class="side-menu full-height">
	<br />
	<ul class="root-menu">
		<li><h4>Filter</h4></li>
        <li class="has-pd">
        	{!! Form::label("status-select", "Status") !!}
			{!! Form::select("status", 
		    	array(
		    		"null" => "All", 
		    		"published" => "Published", 
		    		"draft" => "Draft"
    			), 
	    		Input::get("status"),
	    		array("class" => "status-select", "data-media" => "small-medium")
    		) !!}
		</li>
        <li class="has-pd">
        	{!! Form::open(array("route" => "admin-work-posts", "method" => "GET")) !!}
				{!! Form::label("q", "Search") !!}
				<div class="row collapse">
					<div class="small-9 columns">
						{!! Form::text("q", Input::get("q")) !!}
					</div>
					<div class="small-3 columns">
						<button type="submit" class="button secondary postfix"><span class="fa fa-search"></span></button>
					</div>
				</div>
			{!! Form::close() !!}
        </li>    
    </ul>
</nav>

<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
    <div class="small-6 columns align-right">
    	<a class="link-icon mg-r" href="{!! URL::route('admin-work-post-new') !!}">
    		<span class="fa fa-plus"></span>
    	</a>
        <a class="side-menu-toggle link-icon" data-side="right">
            <span class="fa fa-search"></span>
        </a>
    </div>
</div>

<div id="admin-blogposts" class="container">
	<h3 class="title">Blog Posts</h3>
	<br />
	
	@include("admin.alert-box")
	
	@if (Input::get("q") != null || 
		Input::get("status") != null || 
		Input::get("author") != null || 
		Input::get("tag") != null
		)
		<div class="hide-for-large-up">
			@if (Input::get("status") != null)
				<p>Status : {!! Input::get("status") !!}</p>
			@endif
			@if (Input::get("q") != null)
				<p>Search : "{!! Input::get("q") !!}"</p>
			@endif
			
			@if (Input::get("author") != null)
				<p>Author : {!! Input::get("author") !!}</p>
			@elseif (Input::get("tag") != null)
				<p>Tag : {!! Input::get("tag") !!}</p>
			@endif
			
			<p>({!! HTML::linkRoute("admin-work-posts", "View all data") !!})</p>
			<br />
		</div>
	@endif
	
	<div class="show-for-large-up">
		{!! HTML::linkRoute("admin-work-post-new", "Add Post", [], array("class" => "button")) !!}
		<br /><br />
	</div>
	
	<div class="row full-width ui-block mg-b show-for-large-up">
		<div class="small-12 columns">
			<h4>Filter</h4>
			
			@if (Input::get("q") != null || 
				Input::get("status") != null || 
				Input::get("author") != null || 
				Input::get("tag") != null
				)
				
				@if (Input::get("author") != null)
					<p>Author : {!! Input::get("author") !!}</p>
				@elseif (Input::get("tag") != null)
					<p>Tag : {!! Input::get("tag") !!}</p>
				@endif
				
				<p>({!! HTML::linkRoute("admin-work-posts", "View all data") !!})</p>
				<br />
				
			@endif
		</div>
		
		<div class="small-12 large-4 columns medium-pd-r">
			{!! Form::label("status-select", "Status") !!}
			{!! Form::select("status", 
		    	array(
		    		"null" => "All", 
		    		"published" => "Published", 
		    		"draft" => "Draft"
    			), 
	    		Input::get("status"),
	    		array("class" => "status-select", "data-media" => "large")
    		) !!}
		</div>
		
		<div class="small-12 large-4 columns medium-pd-l">
			{!! Form::open(array("route" => "admin-work-posts", "method" => "GET")) !!}
				{!! Form::label("q", "Search") !!}
				<div class="row collapse">
					<div class="small-9 columns">
						{!! Form::text("q", Input::get("q")) !!}
					</div>
					<div class="small-3 columns">
						{!! Form::button("Search", 
							array(
				                "class" => "button secondary postfix", 
				                "type" => "submit"
			                )
						) !!}
					</div>
				</div>
			{!! Form::close() !!}
		</div>
		
		<div class="small-12 large-4 columns"></div>
	</div>
	
	<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
		@foreach ($posts as $post)
			<li>
				<div class="post-item ui-block ui-card no-pd">
					<p class="post-feature-image">{!! HTML::image($post->feature_image_url) !!}</p>
					<div class="post-details">
						<h5>
							{!! $post->title !!}
							<span class="status">{!! ($post->status == "draft") ? " (".$post->status.")" : "" !!}</span>
						</h5>
						
						<p>
							@if (!$post->is_selected)
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-work-post-toggle-selected', array($post->id)) !!}" title="Set Featured">
										<span class="tf-icon fa fa-star"></span>
									</a>
								@endif
							@else
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-work-post-toggle-selected', array($post->id)) !!}" title="Unset Featured">
										<span class="tf-icon featured fa fa-star"></span>
									</a>
								@else
									<span class="tf-icon featured fa fa-star"></span>
								@endif
							@endif
						</p>
						
						<p class="show-for-large-up">
							By 
							{!! HTML::linkRoute("admin-work-posts", $post->author->username, 
							array("author" => $post->author->username)) !!}
						</p>
						
						
						<p class="text-date show-for-large-up">Created : {!! date("M n, Y g:i A", strtotime($post->created_at)) !!}</p>
						@if ($post->updated_at != $post->created_at)
							<p class="text-date show-for-large-up">Last edited : {!! date("M n, Y g:i A", strtotime($post->updated_at)) !!}</p>
						@endif
						
						<p class="text-date show-for-large-up">{!! $post->hits !!} views</p>
						
						<div class="row">
							<div class="small-4 columns">
								{!! HTML::linkRoute("admin-work-post-preview", "Preview", 
									array($post->id),
									array("class" => "card-button"))
								!!}
							</div>
							<div class="small-4 columns">
								@if (Auth::user()->role == "admin" || Auth::user()->id == $post->author->id)
									{!! HTML::linkRoute("admin-work-post-edit", "Edit", 
										array($post->id), 
										array("class" => "card-button"))
									!!}
								@else
									<span class="card-button disabled">Edit</span>
								@endif
							</div>
							<div class="small-4 columns">
								@if (Auth::user()->role == "admin" || Auth::user()->id == $post->author->id)
									<a class="card-button end" data-reveal-id="delete-modal-id-{!! $post->id !!}">Delete</a>
									<div id="delete-modal-id-{!! $post->id !!}" class="reveal-modal tiny" data-reveal>
										<h4>Confirm delete</h4>
										<p>"{!! $post->title !!}"</p>
										{!! Form::open(array("route" => array("admin-work-post-delete", $post->id), "method" => "delete")) !!}
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

