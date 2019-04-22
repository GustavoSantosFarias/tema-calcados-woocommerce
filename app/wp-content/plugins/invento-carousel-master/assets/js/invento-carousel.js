$(document).ready(function(){
	inventoCarousel();
});

function inventoCarousel(){
	$('#banners-list').slick({
	  // fade: true,
	  adaptiveHeight: true,
	  autoplay: true,
	  dots: true,
	  infinite: false,
	  speed: 500,
	  slidesToShow: 1,
	  slidesToScroll: 1
	});
}