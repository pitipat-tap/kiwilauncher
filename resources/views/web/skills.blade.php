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
                {!! HTML::image("image/icon/skills-creative.svg", "Development") !!}
                <h6>Development</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "UX Design") !!}
                <h6>UX Design</h6>
            </li>
            <li class="skill">
                {!! HTML::image("image/icon/skills-creative.svg", "Branding") !!}
                <h6>Branding</h6>
            </li>
        </ul>
    </section>
    
    <div class="border-section border-white-white"></div>
    
    <section id="process" class="section-frame">
        <h2 class="section-title">Process</h2>
        
        <ul id="process-list" class="single-col-wrapper">
            <li class="active">
                <div class="circuit-v process-circuit above">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
                <img class="process-img" src="http://placehold.it/800x450" />
                <div class="process-text has-pd-lr">
                    <h4 class="process-title">Requirement</h4>
                    <p>
                        Cras dolor ante, convallis in est sit amet, blandit commodo tortor. 
                        Suspendisse consectetur, diam in aliquam finibus, lacus lorem fringilla ipsum, 
                    </p>
                </div>
                <div class="circuit-v process-circuit below">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
            </li>
            <li>
                <div class="circuit-v process-circuit above">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
                <img class="process-img" src="http://placehold.it/800x450" />
                <div class="process-text has-pd-lr">
                    <h4 class="process-title">Research</h4>
                    <p>
                        Cras dolor ante, convallis in est sit amet, blandit commodo tortor. 
                        Suspendisse consectetur, diam in aliquam finibus, lacus lorem fringilla ipsum, 
                    </p>
                </div>
                <div class="circuit-v process-circuit below">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
            </li>
            <li class="has-mg-b">
                <div class="circuit-v process-circuit above">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
                <img class="process-img" src="http://placehold.it/800x450" />
                <div class="process-text has-pd-lr">
                    <h4 class="process-title">Development</h4>
                    <p>
                        Cras dolor ante, convallis in est sit amet, blandit commodo tortor. 
                        Suspendisse consectetur, diam in aliquam finibus, lacus lorem fringilla ipsum, 
                    </p>
                </div>
                <div class="circuit-v process-circuit below">
                    <span class="circuit-v-line process-circuit-line"></span>
                    <span class="circuit-v-dot process-circuit-dot"></span>
                </div>
            </li>
        </ul>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop