jQuery("document").ready(function(){
    labelActiveClass();
});

function labelActiveClass(){
    jQuery("label.clickable").on("click",function(){
        jQuery(this).toggleClass("active");

        if(jQuery(this).hasClass("active")){
            jQuery("#products-category").addClass("active");
        }else{
            jQuery("#products-category").removeClass("active"); 
        }
    });
}

