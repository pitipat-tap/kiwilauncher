 $(document).ready(function() {
     $(".work-figure").mouseover(function(event) {
         $(this).closest("li").siblings("li").find(".work-figure .figure-layer").addClass("reveal");
     });
     
     $(".work-figure").mouseout(function(event) {
         $(this).closest("li").siblings("li").find(".work-figure .figure-layer").removeClass("reveal");
     });
 });