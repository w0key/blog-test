jQuery(function($){
	var categoryList;
	var AuthorsList;

	$.ajax({
		type: "GET",
		dataType: 'JSON',
		url: "http://security.metamorphosiss.ru/category/get/all",
			success: function(response){
				var len = response.length;
				
				var _dataToStock=`<select id="category" name='category_id' class='form-control'>`;
				
				for(var i=0; i<len; i++){
					var id = response[i].id;
					var name = response[i].name;
					
					console.log(name);
					
					_dataToStock+=`<option value='` + id + `'>` + name + `</option>`;
				}
				
				 _dataToStock+=`</select>`;
				 
				 getCategory(_dataToStock);
			}
	});
	
	$.ajax({
		type: "GET",
		dataType: 'JSON',
		url: "http://security.metamorphosiss.ru/author/get/all",
			success: function(response){
				var len = response.length;
				
				var _dataToStock=`<select id="author" name='author_id' class='form-control'>`;
				
				for(var i=0; i<len; i++){
					var id = response[i].author_id;
					var name = response[i].author_name;
					
					console.log(name);
					
					_dataToStock+=`<option value='` + id + `'>` + name + `</option>`;
				}
				
				 _dataToStock+=`</select>`;
				 
				 getAuthors(_dataToStock);
			}
	});
	  
	function getCategory(data){
		categoryList = data;
	}
	
	function getAuthors(data){
		AuthorsList = data;
	}

    $(document).on('click', '.create-product-button', function(){
		
			var create_product_html=`
			<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
				<span class='glyphicon glyphicon-list'></span> Все публикации
			</div>
			
			<form id='create-product-form' action='#' enctype="multipart/form-data" method='post' border='0'>
				<table class='table table-hover table-responsive table-bordered'>

					<tr>
						<td>Заголовок</td>
						<td><input id="title" type='text' name='title' class='form-control' maxlength="15" required /></td>
					</tr>
					
					<tr>
						<td>Текст</td>
						<td><textarea id="text" name='text' class='form-control' required></textarea></td>
					</tr>
					
					<tr>
						<td>Изображение (только jpg)</td>
						<td><input name="file" class='form-control' id="file" type="file"/></td>
					</tr>

					<tr>
						<td>Категория</td>
						<td>` + categoryList + `</td>
					</tr>
					
					<tr>
						<td>Автор</td>
						<td>` + AuthorsList + `</td>
					</tr>

					<tr>
						<td></td>
						<td>
							<button type='submit' class='btn btn-primary'>
								<span class='glyphicon glyphicon-plus'></span> Создать товар
							</button>
						</td>
					</tr>

				</table>
			</form>`;
			
			$("#page-content").html(create_product_html);
			changePageTitle("Создание публикации");
		
    });

		$(document).on('submit', '#create-product-form', function(){

			var form_data = new FormData();    
			var file_data = $('#file')[0].files;
			
			form_data.append('title', $("#title").val());
			form_data.append('text', $("#text").val());
			form_data.append('category', $("#category").val());
			form_data.append('author', $("#author").val());
			form_data.append('file', file_data[0]);
		
			$.ajax({
				url: "http://security.metamorphosiss.ru/news/add",
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