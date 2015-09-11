<header>
    <a id="header-brand" data-fn="close">
        <span id="header-brand-logo"></span>
        <h6 id="header-page-text">All Work &nbsp<i class="fa fa-chevron-down"></i></h6>
    </a>
    <div class="work-menu-container">

        <ul class="work-sub-menu">
            @for($i = 0; $i < sizeof($categories); $i++)
            <li class="circuit-v-row ">
                @if($i == 0)
                    <div class="circuit-v menu-circuit first">
                @elseif($i == sizeof($categories)-1)
                    <div class="circuit-v menu-circuit last">
                @else
                    <div class="circuit-v menu-circuit">
                @endif
                    <span class="circuit-v-line menu-circuit-line"></span>
                    <span class="circuit-v-dot menu-circuit-dot"></span>
                </div>
                <div class="menu-text">
                    <h6>
                        <a href="http://localhost/kiwilauncher/public" class="menu-item-link">{!! $categories[$i]->name !!}</a>
                    </h6>
                </div>

            </li>
            @endfor
        </ul>

    </div>
</header>
