<a id="menu-toggle" data-fn="open">
    <span id="menu-toggle-icon"></span>
    <span id="menu-toggle-text">Menu</span>
</a>

<div id="menu-back-cover" style="display: none;"></div>

<div id="menu" style="display: none;">
    <ul>
        <li class="active">
            <h6>
                {!! HTML::link("/", "Home", array("class" => "menu-item-link")) !!}
            </h6>
            <div class="border-section border-menu-hr" data-dir="left"></div>
        </li>
        <li>
            <h6>
                {!! HTML::linkRoute("skills", "Skills &amp; Process", [], array("class" => "menu-item-link")) !!}
            </h6>
            <div class="border-section border-menu-hr" data-dir="right"></div>
        <li>
            <h6>
                <a class="menu-item-link">Works</a>
            </h6>
            <div class="border-section border-menu-hr" data-dir="left"></div>
        </li>
        <li>
            <h6>
                <a class="menu-item-link">Blog</a>
            </h6>
            <div class="border-section border-menu-hr" data-dir="right"></div>
        </li>
        <li>
            <h6>
                <a class="menu-item-link">Contact Us</a>
            </h6>
            <div class="border-section border-menu-hr" data-dir="left"></div>
        </li>
    </ul>
</div>


