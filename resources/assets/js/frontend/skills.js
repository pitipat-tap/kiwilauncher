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