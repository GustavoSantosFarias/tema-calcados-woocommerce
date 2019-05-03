$(document).ready(function(){
    mobileMenu();
    featuredsProductsCarousel();
});

function mobileMenu(){
    $("#mobile-nav-icon .burguer-menu").on("click",function(){
        $("#mobile-nav,#dark-mask").addClass("active");
    });

    $("#dark-mask").on("click",function(){
        $("#mobile-nav,#dark-mask").removeClass("active");
    });
}

function featuredsProductsCarousel(){
    $('.owl-carousel').owlCarousel({
        dots: true,
        responsive:{
            0:{
                items:2
            },
            767:{
                items:4
            }
        }
    })
}