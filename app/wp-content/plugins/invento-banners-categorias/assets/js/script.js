jQuery(function($){

    uploadGalleryImage();

    function uploadGalleryImage(){
		/*
		* Select/Upload image(s) event
		*/

		// var input_imagem = $(".input_banner_meta[type=hidden]");

		// if (input_imagem.val() != '') {
		// 	$('.remove_image_button').show();
		// }

		$('body').on('click', '.category-banner-button', function(e){
			e.preventDefault();
	 			
    		var button = $(this);
		    
		    custom_uploader = wp.media({
				title: 'Adicionar Banner',
				library : {
					type : 'image'
				},
				button: {
					text: 'Add Banner'
				},
				multiple: false 

			}).on('select', function() {
				var attachment = custom_uploader.state().get('selection').first().toJSON();

				success(button,attachment);
			})
			.open();
		});
	 
    }
    
    function success(button,attachment){
		$(button).siblings(".img-banner-category").attr('src',attachment.url);
        $(button).siblings('input').val(attachment.id);
	}

}); 

