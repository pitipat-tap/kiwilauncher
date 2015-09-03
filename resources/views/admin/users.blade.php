@extends("../admin-layouts.main-admin")


@section("title")
Users | 
@stop


<?php
use Chromabits\Pagination\FoundationPresenter;
?>


@section("body")

@include("admin-layouts.menu-admin", array("link" => "users", "has_sublink" => 0, "sublink" => ""))

<nav id="right-side-menu" class="side-menu full-height">
	<br />
	<ul>
		<li><h4>Filter</h4></li>
        <li class="has-pd">
        	{!! Form::open(array("route" => "admin-users", "method" => "get")) !!}
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
    	<a class="link-icon mg-r" href="{!! URL::route('admin-user-new') !!}">
    		<span class="fa fa-plus"></span>
    	</a>
        <a class="side-menu-toggle link-icon" data-side="right">
            <span class="fa fa-search"></span>
        </a>
    </div>
</div>

<div id="admin-users" class="container">
    <h3 class="title">Users</h3>
    <br />
    
    @include("admin.alert-box")
    
    @if (Input::get("q") != null)
		<div class="hide-for-large-up">
			@if (Input::get("q") != null)
				<p>Search : "{!! Input::get("q") !!}"</p>
			@endif
			<p>({!! HTML::linkRoute("admin-users", "View all data") !!})</p>
			<br />
		</div>
	@endif
	
	<div class="show-for-large-up">
		{!! HTML::linkRoute("admin-user-new", "Add user", [], array("class" => "button")) !!}
		<br /><br />
	</div>
    
	<div class="row full-width ui-block mg-b show-for-large-up">
		<div class="small-12 columns">
			<h4>Filter</h4>
			
			@if (Input::get("role") != null || Input::get("q") != null)
				<p>({!! HTML::linkRoute("admin-users", "View all data") !!})</p>
				<br />
			@endif
		</div>
		
		<div class="small-12 large-4 columns medium-pd-r">
			{!! Form::open(array("route" => "admin-users", "method" => "get")) !!}
                {!! Form::label("q", "Search") !!}
				<div class="row collapse">
					<div class="small-9 columns">
						{!! Form::text("q", Input::get("q")) !!}
					</div>
					<div class="small-3 columns">
						{!! Form::button("search", 
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
	            	<th class="c-show-for-small-only">User</th>
	                <th class="show-for-medium-up username">Username</th>
	                <th class="show-for-large-up realname">Name</th>
	                <th class="show-for-large-up email">Email</th>
	                <th class="show-for-medium-up role">Role</th>
	                <th class="show-for-medium-up posts">Posts</th>
	                <th class="show-for-medium-up actions">Actions</th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach ($users as $user)
	                <tr>
	                    <td class="c-show-for-small-only">
	                    	<br />
	                        <span>
	                        	@if ($user->profile_image == null || trim($user->profile_image == ""))
		                    		{!! HTML::image("/images/admin/default-profile-image.jpg", "", array("class" => "profile-image")) !!}
		                    	@else
		                    		{!! HTML::image($user->profile_image, "", array("class" => "profile-image")) !!}
		                    	@endif
	                        	{!! $user->username !!}
                        	</span>
	                        <br /><br />
	                        <span>
	                        	<b>Role</b> : {!! $user->role !!}
                        	</span>
	                        <br /><br />
	                        <span>
	                        	<b>Blog posts</b> : 
	                        	{!! HTML::linkRoute("admin-blog-posts", $user->blogPosts()->count()." blog posts", 
	                        	array("user_id" => $user->id)) !!}
	                        	
	                        	{!! HTML::linkRoute("admin-image-posts", $user->imagePosts()->count()." image posts", 
	                        	array("user_id" => $user->id)) !!}
                        	</span>
	                        <br /><br />
	                        <span>
	                        	{!! HTML::linkRoute("admin-user-edit", "Edit", array($user->id), array("class" => "small-link mg-r")) !!}
		                        <a data-reveal-id="delete-small-modal-id-{!! $user->id !!}">Delete</a>
		                        <div id="delete-small-modal-id-{!! $user->id !!}" class="reveal-modal tiny" data-reveal>
									<h4>Confirm delete</h4>
									<p>"{!! $user->username !!}"</p>
								<br>
								{!! Form::open(array("route" => array("admin-user-delete", $user->id), "method" => "delete")) !!}
									<p>User's posts options</p>
									{!! Form::radio('option', 'transfer', true, array("id" => "option-1-small-".$user->id)) !!}
									{!! Form::label("option-1-small-".$user->id, "Transfer to me") !!}
									<br />
									{!! Form::radio('option', 'delete_all', false, array("id" => "option-2-small-".$user->id)) !!}
									{!! Form::label("option-2-small-".$user->id, "Delete all") !!}
									<br /><br />
									
									{!! Form::button("Delete", array("type" => "submit")) !!}
								{!! Form::close() !!}
									<a class="close-reveal-modal">&#215;</a>
								</div>
	                    	</span>
	                    	<br /><br />
	                    </td>
	                    <td class="show-for-medium-up">
	                    	@if ($user->profile_image == null || trim($user->profile_image == ""))
	                    		{!! HTML::image("/images/admin/default-profile-image.jpg", "", array("class" => "profile-image")) !!}
	                    	@else
	                    		{!! HTML::image($user->profile_image, "", array("class" => "profile-image")) !!}
	                    	@endif
	                    	{!! $user->username !!}
                    	</td>
	                    <td class="show-for-large-up">{!! $user->realname !!}</td>
	                    <td class="show-for-large-up">{!! $user->email !!}</td>
	                    <td class="show-for-medium-up">{!! $user->role !!}</td>
	                    <td class="show-for-medium-up">
	                    	{!! HTML::linkRoute("admin-blog-posts", $user->blogPosts()->count()." blog posts", 
	                    		array("user_id" => $user->id)
	                    	) !!}
	                    	<br>
	                    	{!! HTML::linkRoute("admin-image-posts", $user->imagePosts()->count()." image posts", 
	                    		array("user_id" => $user->id)
	                    	) !!}
	                    </td>
	                    <td class="show-for-medium-up">
	                    	@if (Auth::user()->id == $user->id)
	                    		{!! HTML::linkRoute("admin-profile-edit", "Edit") !!}
	                    	@else
	                    		{!! HTML::linkRoute("admin-user-edit", "Edit", array($user->id)) !!}
	                    		<br /><br />
		                    	<a data-reveal-id="delete-modal-id-{!! $user->id !!}">Delete</a>
		                    	<br /><br />
		                        <div id="delete-modal-id-{!! $user->id !!}" class="reveal-modal tiny" data-reveal>
									<h4>Confirm delete</h4>
									<p>"{!! $user->username !!}"</p>
									<br>
									{!! Form::open(array("route" => array("admin-user-delete", $user->id), "method" => "delete")) !!}
										<p>User's posts options</p>
										{!! Form::radio('option', 'transfer', true, array("id" => "option-1-".$user->id)) !!}
										{!! Form::label("option-1-".$user->id, "Transfer to me") !!}
										<br />
										{!! Form::radio('option', 'delete_all', false, array("id" => "option-2-".$user->id)) !!}
										{!! Form::label("option-2-".$user->id, "Delete all") !!}
										<br /><br />
										
										{!! Form::button("Delete", array("type" => "submit")) !!}
									{!! Form::close() !!}
									<a class="close-reveal-modal">&#215;</a>
								</div>
	                    	@endif
	                    </td>
	                </tr>
	            @endforeach
	        </tbody>
	    </table>
    </div>
    
    @if ($users->total() > $users->perPage())
		<div class="pagination-container">
			{!! str_replace('/?', '?', $users->appends(Request::except("page"))->render(new FoundationPresenter($users))) !!}
		</div>
	@endif
</div>

@stop
