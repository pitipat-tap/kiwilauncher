@extends("../admin-layouts.main-admin")


@section("title")
Admin Login | 
@stop


@section("specific_js_head")
<script>
    window.onload = function() {
      $(':text[name="username"]').focus();
    }
</script>
@stop


@section("body")

<div class="row container container-center">
    <div class="small-12 medium-6 medium-centered columns">
        <br /><br />
        <div class="ui-block mg">
            <h2>Admin Login</h2>
            
            @include("admin.alert-box")
            
            {!! Form::open(array("route" => "admin-auth", "method" => "post")) !!}
                {!! Form::text("username", null, array("placeholder" => "Username", "autofocus" => 1)) !!}
                {!! Form::password("password", array("placeholder" => "Password")) !!}
                {!! Form::checkbox("remember", "1", null, array("id" => "remember")) !!}
                {!! Form::label("remember", "Remember me") !!}
                <br />
                {!! Form::submit("Log in", array("class" => "button"))!!}
            {!! Form::close() !!}
        </div>
        <br />
        
        <p>
        	<a href="{!! URL::to('/home') !!}" class="text-secondary">
        		<span class="fa fa-long-arrow-left"></span> Back to Homepage
        	</a>
        </p>
    </div>
</div>

@stop




