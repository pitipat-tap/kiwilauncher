@extends("../admin-layouts.main-admin")


@section("title")
Dashboard | 
@stop


@section("specific_js_head")
{!! HTML::script("/js/Chart.min.js") !!}
{!! HTML::script("/js/moment.min.js") !!}
{!! HTML::script("/js/admin-index.js") !!}
@stop


@section("body")

@include("admin-layouts.menu-admin", array("link" => "dashboard", "has_sublink" => 0, "sublink" => ""))

<div class="row container ui-block mg-b small-medium-header hide-for-large-up">
    <div class="small-6 columns">
        <a class="side-menu-toggle link-icon" data-side="left">
            <span class="fa fa-bars"></span>
        </a>
    </div>
</div>

<div id="dashboard" class="container">
	<h3 class="title">Dashboard</h3>
	<br />
	
	<ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-4 stat-block-group">
		<li>
			<a h class="count-block">
				<div class="ui-block align-center">
					<h4>{!! $blogposts->count() !!}</h4>
					<p>Blog posts</p>
				</div>
			</a>
		</li>
		
		<li>
			<a href="{!! URL::route('admin-image-posts') !!}" class="count-block">
				<div class="ui-block align-center">
					<h4>{!! $imageposts->count() !!}</h4>
					<p>Image posts</p>
				</div>
			</a>
		</li>
	</ul>
	<br />
	
	
	<!-- <h4>Statistic</h4>
	
	<div class="row full-width">
		<div class="small-12 medium-6 columns">
			<div class="ui-block medium-half-mg-r mg-b">
				<p>Blog/Image Post in last 6 months</p>
				<p class="graph-label"><span class="lb bp"></span> Blog Posts</p>
				<p class="graph-label"><span class="lb ip"></span> Image Posts</p>
				<canvas id="graph-post" width="800" height="480" class="ui-graph"></canvas>
			</div>
		</div>
		
		<div class="small-12 medium-6 columns">
			<div class="ui-block medium-half-mg-l mg-b">
				<p>Customer subscription in last 6 months</p>
				<p class="graph-label"><span class="lb cs"></span> Customer subscription</p>
				<canvas id="graph-subsc" width="800" height="480" class="ui-graph"></canvas>
			</div>
		</div>
	</div>
	<br />
	
	
	<h4>Blog post</h4>
	
	<div class="row full-width">
		<div class="small-12 medium-6 columns">
			<div class="ui-block medium-half-mg-r mg-b">
				<h6>Most viewed</h6>
				<br />
				
			</div>
		</div>
			
		<div class="small-12 medium-6 columns">
			
		</div>
	</div>
	<br />
	
	
	<h4>Image post</h4>
	
	<div class="row full-width">
		<div class="small-12 medium-6 columns">
			<div class="ui-block medium-half-mg-r mg-b">
				<h6>Recent image</h6>
				<br />
				
				
			</div>
		</div>
	</div> -->
</div>

@stop
