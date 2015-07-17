@extends('../web-layouts.main')


@section("specific-meta")
<meta name="description" content="{!! defaultDescription() !!}" />
<meta property="og:title" content="{!! defaultTitle() !!}" />
<meta property="og:description" content="{!! defaultDescription() !!}" />

@stop


@section("specific-js-head")
{!! HTML::script("js/web-skills.js") !!}
@stop


@section("body")

@include("web-layouts.menu", array("link" => "skills"))

<div id="skills-and-process">
    <section id="skills" class="section-frame">
        <h2 class="section-title">Skills</h2>
        
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4 multi-col-wrapper">
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>Creative Idea</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>Development</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>UX Design</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>Branding</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>Creative Idea</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Creative") !!}
                <h6>Creative Idea</h6>
            </li>
        </ul>
    </section>
    
    <div class="border-section border-white-white"></div>
    
    <section id="process" class="section-frame">
        <h2 class="section-title">Process</h2>
        
        <ul class="single-col-wrapper">
            <li class="has-mg-b">
                <img class="process-img" src="http://placehold.it/800x450" />
                <div class="process-text has-pd-lr">
                    <h4>Requirement</h4>
                    <p>
                        Cras dolor ante, convallis in est sit amet, blandit commodo tortor. 
                        Suspendisse consectetur, diam in aliquam finibus, lacus lorem fringilla ipsum, 
                    </p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link sltd-work-figure">
                    {!! HTML::image("image/sample/sandawe-1.jpg", "Some web", array(
                        "class" => "figure-img sltd-work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="sltd-work-text has-pd-lr">
                    <h4><a>Some Website</a></h4>
                    <p>Website</p>
                </div>
            </li>
            <li class="has-mg-b">
                <a class="figure-link sltd-work-figure">
                    {!! HTML::image("image/sample/pairi-daiza-thumb.jpg", "Some web", array(
                        "class" => "figure-img sltd-work-cvimg")
                    ) !!}
                    <div class="figure-layer"></div>
                </a>
                <div class="sltd-work-text has-pd-lr">
                    <h4><a>Some Website</a></h4>
                    <p>Website</p>
                </div>
            </li>
        </ul>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop