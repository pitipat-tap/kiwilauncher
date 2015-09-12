<header>
    <a id="header-brand" data-fn="close">
        <span id="header-brand-logo"></span>
        <h6 id="header-page-text">{!! $dropDown !!} &nbsp<i class="fa fa-chevron-down"></i></h6>
    </a>
    <div class="work-menu-container">

            
        <ul class="work-sub-menu">
            <li class="circuit-v-row ">
                <div class="circuit-v menu-circuit first">
                    <span class="circuit-v-line menu-circuit-line"></span>
                    @if("All Work" == $dropDown)
                        <span class="circuit-v-dot menu-circuit-dot selected-dot"></span>
                    @else
                        <span class="circuit-v-dot menu-circuit-dot"></span>
                    @endif
                </div>
                <div class="menu-text">
                    <h6>
                        <a href="{!! URL::route('works') !!}" class="menu-item-link">All Work</a>
                    </h6>
                </div>

            </li>

            @for($i = 0; $i < sizeof($categories); $i++)
            <li class="circuit-v-row ">
                @if($i == sizeof($categories)-1)
                    <div class="circuit-v menu-circuit last">
                @else
                    <div class="circuit-v menu-circuit">
                @endif
                    <span class="circuit-v-line menu-circuit-line"></span>
                    @if($categories[$i]->name == $dropDown)
                        <span class="circuit-v-dot menu-circuit-dot selected-dot"></span>
                    @else
                        <span class="circuit-v-dot menu-circuit-dot"></span>
                    @endif
                </div>
                <div class="menu-text">
                    <h6>
                        <a href="{!! URL::route('works-category', array($categories[$i]->name)) !!}" class="menu-item-link">{!! $categories[$i]->name !!}</a>
                    </h6>
                </div>

            </li>
            @endfor
        </ul>

    </div>
</header>
