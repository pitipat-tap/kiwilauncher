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

@include("web-layouts.menu")

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
        
        <div class="circuit-v-row process-row single-col-wrapper has-pd-lr">
            <div class="circuit-v process-circuit first">
                <span class="circuit-v-line process-circuit-line"></span>
                <span class="circuit-v-dot process-circuit-dot primary"></span>
            </div>
            <div class="process-detail" data-row="1">
                <img src="http://placehold.it/800x450" />
                <h6>Research</h6>
                <p>
                    fdsf Suspendisse ut efficitur eros. Suspendisse in pellentesque lorem. 
                    Mauris facilisis dolor ac ornare ornare.
                </p>
            </div>
        </div>
        <div class="circuit-v-row process-row single-col-wrapper has-pd-lr">
            <div class="circuit-v process-circuit">
                <span class="circuit-v-line process-circuit-line"></span>
                <span class="circuit-v-dot process-circuit-dot"></span>
            </div>
            <div class="process-detail" data-row="1">
                <img src="http://placehold.it/800x450" />
                <h6>Brainstorm</h6>
                <p>
                    fdsf Suspendisse ut efficitur eros. Suspendisse in pellentesque lorem. 
                    Mauris facilisis dolor ac ornare ornare.
                </p>
            </div>
        </div>
        <div class="circuit-v-row process-row single-col-wrapper has-pd-lr">
            <div class="circuit-v process-circuit last">
                <span class="circuit-v-line process-circuit-line"></span>
                <span class="circuit-v-dot process-circuit-dot"></span>
            </div>
            <div class="process-detail" data-row="1">
                <img src="http://placehold.it/800x450" />
                <h6>Other...</h6>
                <p>
                    fdsf Suspendisse ut efficitur eros. Suspendisse in pellentesque lorem. 
                    Mauris facilisis dolor ac ornare ornare.
                </p>
            </div>
        </div>
    </section>
    
    @include("web-layouts.footer")
</div>

@stop