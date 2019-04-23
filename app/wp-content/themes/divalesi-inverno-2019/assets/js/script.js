$(document).ready(function(){
    mobileMenu();
});

function mobileMenu(){
    $("#mobile-nav-icon .burguer-menu").on("click",function(){
        $("#mobile-nav,#dark-mask").addClass("active");
    });

    $("#dark-mask").on("click",function(){
        $("#mobile-nav,#dark-mask").removeClass("active");
    });
}