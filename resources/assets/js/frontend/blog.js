$(document).ready(function() {
    var bulletItems = $("#blog-posts-ftd-crs .bullets li");
    var ftdPostIndex = 0;
    
    var timeoutHandler = setInterval(nextFtdPost, 5000);
    
    bulletItems.find("a").click(function(event) {
        clearInterval(timeoutHandler);
        
        var li = $(this).parent("li");
        ftdPostIndex = li.index();
        
        var liData = $("#blog-posts-ftd-data li").eq(ftdPostIndex);
        $("#blog-post-ftd-img img").attr("src", liData.attr("data-cvimg"));
        
        li.siblings(".active").removeClass("active");
        li.addClass("active");
        
        timeoutHandler = setInterval(nextFtdPost, 5000);
    });
    
    function nextFtdPost() {
        ftdPostIndex++;
        if (ftdPostIndex >= 3) {
            ftdPostIndex = 0;
        }
        
        //console.log(ftdPostIndex);
        
        bulletItems.eq(ftdPostIndex).find("a").trigger("click");
    }
});