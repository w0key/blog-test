jQuery(function($){
    $(document).on('click', '.create-author-button', function(){
		
			var create_product_html=`
			<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
				<span class='glyphicon glyphicon-list'></span> Все публикации
			</div>
			
			<form id='create-author-form' action='#' enctype="multipart/form-data" method='post' border='0'>
				<table class='table table-hover table-responsive table-bordered'>

					<tr>
						<td>ФИО</td>
						<td><input type='text' id="name" name='name' class='form-control' maxlength="50" required /></td>
					</tr>
					
					<tr>
						<td>Изображение (только jpg)</td>
						<td><input name="file" id="file" class='form-control' type="file"/></td>
					</tr>
					
					<!-- кнопка отправки формы -->
					<tr>
						<td></td>
						<td>
							<button type='submit' class='btn btn-primary'>
								<span class='glyphicon glyphicon-plus'></span> Создать автора
							</button>
						</td>
					</tr>

				</table>
			</form>`;
			
			$("#page-content").html(create_product_html);
			changePageTitle("Создание автора");
		
    });

		$(document).on('submit', '#create-author-form', function(){
			
			var form_data = new FormData();    
			
			var file_data = $('#file')[0].files;
			form_data.append('file', file_data[0]);
			form_data.append('name', $("#name").val());
			
			$.ajax({
				url: "http://security.metamorphosiss.ru/author/add",
				type : "POST",
				contentType : false,
				data : form_data,
				processData: false,
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