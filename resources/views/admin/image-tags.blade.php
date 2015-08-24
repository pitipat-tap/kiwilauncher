@extends("../admin-layouts.main-admin")


@section("title")
Image Tags | 
@stop


<?php
use Chromabits\Pagination\FoundationPresenter;
?>


@section("body")

@include("admin-layouts.menu-admin", array("link" => "imageposts", "has_sublink" => 1, "sublink" => "imagetags"))

<nav id="right-side-menu" class="side-menu full-height">
	<br />
	<ul class="root-menu">
		<li><h4>Filter</h4></li>
        <li class="has-pd">
        	{!! Form::open(array("route" => "admin-image-tags", "method" => "get")) !!}
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
        <a class="side-menu-toggle link-icon" data-side="right">
            <span class="fa fa-search"></span>
        </a>
    </div>
</div>

<div id="admin-imagetags" class="container">
    <h3 class="title">Image Tags</h3>
    <br />
    
    @include("admin.alert-box")
    
    @if (Input::get("q") != null)
		<div class="small-medium-align-center hide-for-large-up">
			@if (Input::get("q") != null)
				<p>Search : "{!! Input::get("q") !!}"</p>
			@endif
			<p>({!! HTML::linkRoute("admin-image-tags", "Reset filter") !!})</p>
			<br />
		</div>
	@endif
    
	<div class="row full-width ui-block mg-b show-for-large-up">
		<div class="small-12 columns">
			<h4>Filter</h4>
			
			@if (Input::get("status") != null || Input::get("q") != null)
				<p>({!! HTML::linkRoute("admin-image-tags", "Reset filter") !!})</p>
				<br />
			@endif
		</div>
		
		<div class="small-12 large-4 columns medium-pd-r">
			{!! Form::open(array("route" => "admin-image-tags", "method" => "get")) !!}
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
		<div class="small-12 large-8 columns medium-pd-l"></div>
	</div>
	
	<div class="ui-block mg-b">
		<table class="data" width="100%">
	        <thead>
	            <tr>
	            	<th class="c-show-for-small-only">Tag</th>
	                <th class="show-for-medium-up name">Name</th>
	                <th class="show-for-medium-up featured">Featured</th>
	                <th class="show-for-medium-up total-posts">Image Posts</th>
	                @if (Auth::user()->role == "admin")
	                	<th class="show-for-medium-up actions">Actions</th>
	                @endif
	            </tr>
	        </thead>
	        <tbody>
	            @foreach ($tags as $tag)
	                <tr>
	                    <td class="c-show-for-small-only">
	                    	<br />
	                        <span class="mg-r">
	                        	{!! $tag->name !!} 
	                    	</span>
	                    	<span>
	                    		@if (!$tag->is_featured)
	                    			@if (Auth::user()->role == "admin")
										<a href="{!! URL::route('admin-image-tag-togglefeatured', array($tag->id)) !!}" title="Set Featured">
											<span class="tf-icon fa fa-star"></span>
										</a>
									@endif
								@else
									@if (Auth::user()->role == "admin")
										<a href="{!! URL::route('admin-image-tag-togglefeatured', array($tag->id)) !!}" title="Unset Featured">
											<span class="tf-icon featured fa fa-star"></span>
										</a>
									@else
										<span class="tf-icon featured fa fa-star"></span>
									@endif
								@endif
	                    	</span>
	                        <br /><br />
	                        <span>
	                        	<b>Image posts</b> : 
	                        	{!! HTML::linkRoute("admin-image-posts", $tag->posts()->count()." posts", array("tag" => $tag->name)) !!}
                        	</span>
	                        <br /><br />
	                        @if (Auth::user()->role == "admin")
		                        <span>
			                        <a data-reveal-id="delete-small-modal-id-{!! $tag->id !!}">Delete</a>
		                        	<div id="delete-small-modal-id-{!! $tag->id !!}" class="reveal-modal tiny" data-reveal>
		                        		<h4>Confirm delete</h4>
		                        		<p>"{!! $tag->name !!}"</p>
										{!! Form::open(array("route" => array("admin-image-tag-delete", $tag->id), 'method' => 'delete')) !!}
									        {!! Form::submit("Delete", array("class" => "button")) !!}
									    {!! Form::close() !!}
									    <a class="close-reveal-modal">&#215;</a>
									</div>
		                    	</span>
		                    	<br /><br />
	                    	@endif
	                    </td>
	                    <td class="show-for-medium-up">
	                    	{!! $tag->name !!}
	                	</td>
	                	<td class="show-for-medium-up">
	                		@if (!$tag->is_featured)
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-image-tag-togglefeatured', array($tag->id)) !!}" title="Set Featured">
										<span class="tf-icon fa fa-star"></span>
									</a>
								@endif
							@else
								@if (Auth::user()->role == "admin")
									<a href="{!! URL::route('admin-image-tag-togglefeatured', array($tag->id)) !!}" title="Unset Featured">
										<span class="tf-icon featured fa fa-star"></span>
									</a>
								@else
									<span class="tf-icon featured fa fa-star"></span>
								@endif
							@endif
	                	</td>
	                    <td class="show-for-medium-up">
	                    	{!! HTML::linkRoute("admin-image-posts", $tag->posts()->count()." posts", array("tag" => $tag->name)) !!}
                    	</td>
                    	@if (Auth::user()->role == "admin")
		                    <td class="show-for-medium-up">
		                        <a data-reveal-id="delete-modal-id-{!! $tag->id !!}">Delete</a>
		                        <div id="delete-modal-id-{!! $tag->id !!}" class="reveal-modal tiny" data-reveal>
									<h4>Confirm delete</h4>
									<p>"{!! $tag->name !!}"</p>
									{!! Form::open(array("route" => array("admin-image-tag-delete", $tag->id), "method" => "delete")) !!}
										{!! Form::button("Delete", array("type" => "submit")) !!}
									{!! Form::close() !!}
									<a class="close-reveal-modal">&#215;</a>
								</div>
		                    </td>
	                    @endif
	                </tr>
	            @endforeach
	        </tbody>
	    </table>
    </div>
    
    @if ($tags->total() > $tags->perPage())
		<div class="pagination-container">
			{!! str_replace('/?', '?', $tags->appends(Request::except("page"))->render(new FoundationPresenter($tags))) !!}
		</div>
	@endif
</div>

@stop
