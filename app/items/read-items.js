jQuery(function($){

    showProducts();
	
	$(document).on('click', '.read-products-button', function(){
		showProducts();
	});
	
	
	function showProducts(){

		$.getJSON("http://security.metamorphosiss.ru/news/get/all", function(data){

			readProductsTemplate(data, "");

			changePageTitle("Все публикации");

		});
	}
});
