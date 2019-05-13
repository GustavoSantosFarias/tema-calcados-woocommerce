jQuery("document").ready(function(){
    labelActiveClass();
});

function labelActiveClass(){
    jQuery("label.clickable").on("click",function(){
        jQuery(this).toggleClass("active");

        if(jQuery(".categories-checkbox").hasClass("active")){
            jQuery("#products-category").addClass("active");
        }else{
            jQuery("#products-category").removeClass("active"); 
        }

        cartRulesSelect(this);
    });
}

function cartRulesSelect(element){
    var cart_section = jQuery(element).parent().parent().parent().attr("id");
    
    if(cart_section == "cart-rules"){
        if(jQuery(element).hasClass("active")){
            jQuery(".cart-fields").show();
            jQuery("#type-promotion").val("cart");
        }else{
            jQuery(".cart-fields").hide();
            jQuery("#type-promotion").val("products");
        }
    }
}
