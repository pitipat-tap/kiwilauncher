@extends("../admin-layouts.main-admin")


@section("title")
Add User | 
@stop


@section("specific_css")
{!! HTML::style("/js/fancybox/source/jquery.fancybox.css", array("media" => "screen")) !!}
@stop


@section("specific_js_head")
{!! HTML::script("/js/fancybox/source/jquery.fancybox.pack.js") !!}
{!! HTML::script("/js/admin-user-form.js") !!}
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "users", "has_sublink" => 0, "sublink" => ""))

<?php
	if(!isset($_SESSION)) {
		session_start(); 
	};;
	$_SESSION["USER_ROLE"] = Auth::user()->role;
	
	$lpath = getLinkPath();
?>


<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-users" class="container">
	{!! Form::open(array("route" => "admin-user-create", "method" => "post", "class" => "user-form")) !!}
		<h3 class="title">{!! HTML::linkRoute("admin-users", "Users") !!} <span class="fa fa-angle-right"></span> Add</h3>
		<br />
		
		@include("admin.alert-box")
        
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
        			<h4>User account</h4>
        			<br />
        			
            		{!! HTML::decode(Form::label("username", "Username")) !!}
		            {!! Form::text("username") !!}
		            {!! HTML::decode(Form::label("email", "Email")) !!}
		            {!! Form::email("email") !!}
		            {!! HTML::decode(Form::label("password", "Password")) !!}
		            {!! Form::password("password") !!}
		            {!! HTML::decode(Form::label("password_confirmation", "Confirm password")) !!}
		            {!! Form::password("password_confirmation") !!}
		            {!! Form::label("role", "Role") !!}
		            {!! Form::select("role", array("author" => "Author", "admin" => "Admin"), "author") !!}
            	</div>
            </div>
            
            <div class="small-12 medium-6 columns">
        		<div class="ui-block mg-b medium-half-mg-l">
        			<h4>User info <span class='form-label-notice'>(optional)</span></h4>
        			<br />
        			
        			{!! Form::label("realname", "Realname") !!}
		            {!! Form::text("realname") !!}
		            {!! Form::label("info", "Brief info") !!}
		            {!! Form::textarea("info", null, array("rows" => "5")) !!}
		            <p class="f-label">Profile image</p>
		            
		            <?php $p_link = "http://".$_SERVER['SERVER_NAME'].$lpath."/filemanager/dialog.php?type=1&field_id=profile-image-url"; ?>
		            <a class="fm-open" href="<?php echo $p_link; ?>">
	                    {!! HTML::image("/images/admin/default-profile-image.jpg", 
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