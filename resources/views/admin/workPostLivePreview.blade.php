@extends("../admin-layouts.main-admin")


@section("title")
{!! $post["title"] !!} (Live Preview) | 
@stop

{!! HTML::style("/css/web-style.css") !!}

@section("body")

@include("admin-layouts.menu-admin", array("link" => "workposts", "has_sublink" => 1, "sublink" => "workposts"))

<div class="row full-width container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="admin-blogposts" class="container">


	<section id="works-content" class="section-frame first">
        <div class="medium-12 small-12 column">
            <div>
                <!--<img class="figure-img work-cvimg" src="http://placehold.it/800x450" />-->
                {!! HTML::image($post["feature_image_url"], "Some app", array(
                    "class" => "figure-img work-cvimg")
                ) !!}
            </div>
        </div >
        <div class="has-mg-b  single-col-wrapper">
            <h4 style="margin-bottom: 0px">{!! $post["title"] !!}</h4>

            <br>
            <br>
            <p id="about-description" class="has-pd-lr">
                {!! $post["description"] !!}
            </p>
            <br>
            <h6><a href='{!! $post["link_url"] !!}' target="_blank">visit website</a></h6>
        </div>

        @for($i = 0; $i < 5; $i++)
				@if($post["screenshotsURL".$i] != '')
				<div class="single-col-wrapper has-mg-b">
	                {!! HTML::image($post["screenshotsURL".$i], "Some app") !!}
	            </div>
			@endif
		@endfor
        
    </section>

    </div>
</div>