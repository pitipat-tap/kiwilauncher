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
    
    var waypoint = $("#process-list .process-img").waypoint({
        handler: function(direction) {
            var li = $(this.element).closest("li");
            if (direction == "down") {
                li.siblings("li").removeClass("active");
                li.addClass("active");
            }
            else if (direction == "up" && li.index() != 0) {
                li.removeClass("active");
                li.prev("li").addClass("active");
            }
        },
        offset: "60%"
    });
})