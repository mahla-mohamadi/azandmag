var $ = jQuery;

$(document).ready(function(){
    $(".searchIcon").click(function() {
        $(".searchOverlay").fadeIn(500);
        $(".searchParent").fadeIn(500);
    });
    $(".searchOverlay , .closeBtn , .closeIcon").click(function() {
        $(".searchOverlay").fadeOut(500);
        $(".searchParent").fadeOut(500);
    });
});