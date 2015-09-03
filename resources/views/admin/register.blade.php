@extends("../admin-layouts.main-admin")


@section("title")
Admin Register | 
@stop


@section("specific_js_head")
<script>
	window.onload = function() {
	  $(':text[name="username"]').focus();
	}
</script>
@stop


@section("body")

<div class="row">
    <div class="small-12 medium-6 medium-centered columns">
        <br /><br />
        <div class="ui-block mg">
	        <h2>Admin Register</h2>
	        
	        @include("admin.alert-box")
	        
	        {!! Form::open(array("route" => "admin-create", "method" => "post")) !!}
	            {!! Form::label("username", "username") !!}
	            {!! Form::text("username") !!}
	            {!! Form::label("email", "email") !!}
	            {!! Form::text("email") !!}
	            {!! Form::label("password", "password") !!}
	            {!! Form::password("password") !!}
	            {!! Form::label("password_confirmation", "confirm") !!}
	            {!! Form::password("password_confirmation") !!}
	            
	            {!! Form::submit("Register", array("class" => "button"))!!}
	        {!! Form::close() !!}
        </div>
    </div>
</div>

@stop

