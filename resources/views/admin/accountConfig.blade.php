@extends("../admin-layouts.main-admin")

@section("title")
Account Config | 
@stop


@section("specific_js_head")
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "accountConfig", "has_sublink" => 0, "sublink" => ""))
<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>
<div id="dashboard" class="container">
	<h3 class="title"> Account Config</h3>
    <div id="payment-type"></div>
</div>

@stop

@section("specific_js_body")
    {!! HTML::script("js-react/kiwiReact.js") !!}
@stop
