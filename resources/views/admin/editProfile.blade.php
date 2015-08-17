@extends("../admin-layouts.mainAdmin")


@section("title")
Edit profile |  
@stop


@section("specific_css")
{!! HTML::style("/js/fancybox/source/jquery.fancybox.css", array("media" => "screen")) !!}
@stop


@section("specific_js_head")
{!! HTML::script("/js/fancybox/source/jquery.fancybox.pack.js") !!}
{!! HTML::script("/js/adminUserForm.js") !!}
@stop


@section("body")

@include("admin-layouts.menuAdmin", array("link" => "editprofile", "has_sublink" => 0, "sublink" => ""))

<?php
	session_start();
	$_SESSION["USER_ROLE"] = Auth::user()->role;
	
	$lpath = getLinkPath();
?>


<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-users" class="container">
	{!! Form::model($user, array(
		"route" => "adminProfileUpdate", 
		"class" => "user-form",
		"method" => "patch", 
		"autocomplete" => "off" 
	)) !!}
		<h3 class="title">Edit profile</h3>
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
            		<h4>Change user account data</h4>
            		<p>
            			@if ($user->profile_image == null || trim($user->profile_image == ""))
                    		{!! HTML::image("/images/admin/default-profile-image.jpg", "", array("class" => "profile-image")) !!}
                    	@else
                    		{!! HTML::image($user->profile_image, "", array("class" => "profile-image")) !!}
                    	@endif
            			<span>{!! $user->username !!}</span>
        			</p>
        			<br />
		            {!! Form::label("email", "Email") !!}
		            {!! Form::email("email") !!}
		            <br />
		            
		            <h4>Change password <span class='form-label-notice'>(leave blank if you don't want to change)</span></h4>
		            {!! Form::label("password", "New Password") !!}
		            {!! Form::password("password") !!}
		            {!! Form::label("password_confirmation", "Confirm new password") !!}
		            {!! Form::password("password_confirmation") !!}
		            <br />
            	</div>
            </div>
            
            <div class="small-12 medium-6 columns">
        		<div class="ui-block mg-b medium-half-mg-l">
        			<h4>Change user info</h4>
        			{!! Form::label("realname", "Realname") !!}
		            {!! Form::text("realname") !!}
		            {!! Form::label("info", "Brief info") !!}
		            {!! Form::textarea("info", null, array("rows" => "5")) !!}
        			<br />
        			
        			<h4>Change profile image</h4>
		        	@if ($user->profile_image == null || trim($user->profile_image == ""))
                		<?php $profile_image = URL::to("/images/admin/default-profile-image.jpg"); ?>
                	@else
                		<?php $profile_image = $user->profile_image; ?>
                	@endif
                	
                	<?php $p_link = "http://".$_SERVER['SERVER_NAME'].$lpath."/filemanager/dialog.php?type=1&field_id=profile-image-url"; ?>
                	<a class="fm-open" href="<?php echo $p_link; ?>">
	                    {!! HTML::image($profile_image, 
	                        "Profile image", 
	                        array(
	                            "id" => "profile-image",
	                            "data-default" => URL::to("/images/admin/default-profile-image.jpg")
	                            )
	                        )
	                    !!}
                    </a>
                    
                    {!! Form::text("profile_image", 
                        null, 
                        array(
                            "id" => "profile-image-url",
                            "class" => "image_url far-away",
                            "placeholder" => "Image link",
                            "readonly" => "readonly"
                            ) 
                        ) 
                    !!}   
                    <p>
                    	<a class="fm-open" href="<?php echo $p_link; ?>">Choose image</a> or 
                    	<a id="use-default-image">Use Default</a>
                    </p>
                    <br /><br />
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