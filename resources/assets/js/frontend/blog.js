var tlBlog = new TimelineLite();

$(document).ready(function() {
    var bulletItems = $("#blog-posts-ftd-crs .bullets li");
    var ftdPostIndex = 0;

    var sdasdasd;
    var timeoutHandler = setTimeout(nextFtdPost, 6000);
    
    $('p').each(function() {
        console.log("p");
        if (!$(this).find('img').length) {
          $(this).addClass("has-pd-lr");
        }
    });
                    
    bulletItems.find("a").click(function(event) {
        if ($(this).parent("li").hasClass("active")) {
            return false;
        }
        
        // Clear all timing
        clearTimeout(timeoutHandler);
        tlBlog.pause();
        tlBlog.clear();
        tlBlog.play();
        
        // Set new carousel data
        var li = $(this).parent("li");
        ftdPostIndex = li.index();
        
        var liData = $("#blog-posts-ftd-data li").eq(ftdPostIndex);
        var imageCur = $("#blog-post-ftd-img img.active");
        var imageNext = $("#blog-post-ftd-img img").eq(ftdPostIndex);
        imageCur.css({"z-index": 1});
        imageNext.css({"z-index": 2});
        var text = $("#blog-post-ftd-text");
        text.find(".blog-post-title a").attr("href", liData.attr("data-link")).text(liData.attr("data-title"));
        text.find(".blog-post-rm a").attr("href", liData.attr("data-link"));
        
        // Fade animation
        tlBlog.to(imageCur, 0.6, {
            opacity: 0,
        }, "fade");
        tlBlog.to(imageNext, 0.6, {
            opacity: 1
        }, "fade+=0");
        
        // Set active
        li.siblings(".active").removeClass("active");
        li.addClass("active");
        imageCur.removeClass("active");
        imageNext.addClass("active");
        
        // Reset next post function
        timeoutHandler = setTimeout(nextFtdPost, 6000);
    });
    
    function nextFtdPost() {
        ftdPostIndex++;
        var elements = document.getElementsByClassName("count");
        if (ftdPostIndex >= elements.length) {
            ftdPostIndex = 0;
        }
        
        bulletItems.eq(ftdPostIndex).find("a").trigger("click");
    }
});
