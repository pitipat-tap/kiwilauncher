<nav id="left-side-menu" class="side-menu full-height">
	<div class="brand">
		
	</div>
	<br />
	
    <div class="profile">
        @if (Auth::user()->profile_image == null || trim(Auth::user()->profile_image == ""))
    		<?php $profile_image = URL::to("/image/admin/default-profile-image.jpg"); ?>
    	@else
    		<?php $profile_image = Auth::user()->profile_image; ?>
    	@endif
    	{!! HTML::image($profile_image, "Profile image") !!}
        <h6>{!! Auth::user()->username !!}</h6>
    </div>
    
    <ul class="root-menu">
        <li>
        	<a href="{!! URL::route('admin') !!}" class="{!! isAdminNavLinkActive($link, 'dashboard') !!}">
        		<span class="icon fa fa-bar-chart"></span> Dashboard
    		</a>
    	</li>
    	<li>
            <a href="{!! URL::route('admin-blog-posts') !!}" class="{!! isAdminNavLinkActive($link, 'blogposts') !!}">
        		<span class="icon fa fa-pencil-square-o"></span> Blog 
        		<span class="toggle-sub-menu icon-float fa {!! isAdminIconSubLinkActive($link, 'blogposts') !!}"></span>
    		</a>
    		<ul class="sub-menu {!! isAdminGroupSubLinkToggled($has_sublink, $link, 'blogposts') !!}">
    			<li>
    				<a  href="{!! URL::route('admin-blog-posts') !!}" class="{!! isAdminNavSubLinkActive($has_sublink, $sublink, 'blogposts') !!}">
                        Blog posts
                    </a>
    			</li>
    			
    			<li>
		        	<a  href="{!! URL::route('admin-blog-tags') !!}" class="{!! isAdminNavSubLinkActive($has_sublink, $sublink, 'blogtags') !!}">
                        Blog tags
                    </a>
    			</li>
    		</ul>
    	</li>
    	<li>
            <a href="{!! URL::route('admin-image-posts') !!}" class="{!! isAdminNavLinkActive($link, 'imageposts') !!}">
        		<span class="icon fa fa-picture-o"></span> Gallery
        		<span class="toggle-sub-menu icon-float fa {!! isAdminIconSubLinkActive($link, 'imageposts') !!}"></span>
    		</a>
    		<ul class="sub-menu {!! isAdminGroupSubLinkToggled($has_sublink, $link, 'imageposts') !!}">
    			<li>
    				<a href="{!! URL::route('admin-image-posts') !!}" class="{!! isAdminNavSubLinkActive($has_sublink, $sublink, 'imageposts') !!}">
                        Image posts
                    </a>
    			</li>
    			
    			<li>
		        	<a href="{!! URL::route('admin-image-tags') !!}" class="{!! isAdminNavSubLinkActive($has_sublink, $sublink, 'imagetags') !!}">
                        Image tags
                    </a>
    			</li>
    		</ul>
    	</li>

        <li>
            <a href="{!! URL::route('adminWorkPosts') !!}"  class="{!! isAdminNavLinkActive($link, 'workposts') !!}">
                <span class="icon fa fa-book"></span> Work post
            </a>
        </li>

        <li>
            <a href="{!! URL::route('admin-filemanager') !!}" class="{!! isAdminNavLinkActive($link, 'filemanager') !!}">
                <span class="icon fa fa-folder"></span> File manager
            </a>
        </li>
    	@if (Auth::user()->role == "admin")
	    	<li>
	        	<a href="{!! URL::route('admin-users') !!}"  class="{!! isAdminNavLinkActive($link, 'users') !!}">
                    <span class="icon fa fa-user"></span> Users
                </a>
	    	</li>
    	@endif
    </ul>
    
    <hr />
    
    <ul class="root-menu">
    	<li>
        	<a href="{!! URL::route('admin-profile-edit') !!}"  class="{!! isAdminNavLinkActive($link, 'editprofile') !!}">
                <span class="icon fa fa-wrench"></span> Edit profile
            </a>
		</li>
        <li><a href="{!! URL::route('admin-logout') !!}"><span class="icon fa fa-sign-out"></span> Log out</a></li>
    </ul>
    
    <hr />
    
    <ul class="root-menu">
        <li><a href="{!! URL::to('/') !!}"><span class="icon fa fa-home"></span> Go to homepage</a></li>
    </ul>
</nav>

<div id="cover-bg-menu"></div>

