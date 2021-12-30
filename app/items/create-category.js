jQuery(function($){

    $(document).on('click', '.create-category-button', function(){
		
			var create_product_html=`
			<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
				<span class='glyphicon glyphicon-list'></span> Все публикации
			</div>
			
			<form id='create-category-form' action='#' method='post' border='0'>
				<table class='table table-hover table-responsive table-bordered'>

					<tr>
						<td>Название категории</td>
						<td><input type='text' name='name' class='form-control' maxlength="40" required /></td>
					</tr>
					
					<tr>
						<td>Родительская категория</td>
						<td><input type='text' name='parennt' class='form-control' maxlength="40" required /></td>
					</tr>
					
					<tr>
						<td></td>
						<td>
							<button type='submit' class='btn btn-primary'>
								<span class='glyphicon glyphicon-plus'></span> Создать категории
							</button>
						</td>
					</tr>

				</table>
			</form>`;

			$("#page-content").html(create_product_html);
			changePageTitle("Создание категории");
		
    });

		$(document).on('submit', '#create-category-form', function(){
			var form_data=JSON.stringify($(this).serializeObject());

			$.ajax({
				url: "http://security.metamorphosiss.ru/category/add",
				type : "POST",
				contentType : 'application/json',
				data : form_data,
				success : function(result) {
					showProducts();
				},
				error: function(xhr, resp, text) {
					console.log(xhr, resp, text);
				}
			});
			
			return false;
		});
});