var tl = new TimelineLite();

$(document).ready(function(event) {
    $("#menu-toggle").click(function(event) {
        tl.pause();
        tl.clear();
        tl.play();
        if ($(this).attr("data-fn") == "open") {
            $(this).attr("data-fn", "close");
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "block",
            });
            tl.to("#menu", 0.3, {
                className: "+=opened"
            }, "in");
            tl.to("#menu-back-cover", 0.5, {
                className: "+=opened"
            }, "in+=0.0");
        }
        else if ($(this).attr("data-fn") == "close") {
            $(this).attr("data-fn", "open");
            tl.to("#menu", 0.3, {
                className: "-=opened"
            }, "out");
            tl.to("#menu-back-cover", 0.5, {
                className: "-=opened"
            }, "out+=0.0");
            tl.to("#menu, #menu-back-cover", 0.01, {
                display: "none",
            });
        }
    })
});
$(document).ready(function(event) {
    var pdtValues;
    var pdtExtraHeight = 72;
    
    $(window).on("load", setHeightPct);
    
    $(window).on("resize", setHeightPct);
    
    function setHeightPct () {
        pdtValues = [];
        $(".process-detail").each(function(index) {
            var values = {};
            values["lastHeight"] = $(this).outerHeight();
            values["row"] = $(this).attr("data-row");
            pdtValues.push(values);

            $(this).siblings(".process-circuit").height(values["lastHeight"] + pdtExtraHeight);
        });
    }
})
//# sourceMappingURL=web-skills.js.map