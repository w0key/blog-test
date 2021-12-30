jQuery(function($){

    $(document).on('click', '.read-one-product-button', function(){
        var id = $(this).attr('data-id');
		
		$.getJSON("http://security.metamorphosiss.ru/news/get/" + id, function(data){
			var read_one_product_html=`

				<div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
					<span class='glyphicon glyphicon-list'></span> Все публикации
				</div>
				
				<table class='table table-bordered table-hover'>

					<tr>
						<td class='w-30-pct'>Заголовок</td>
						<td class='w-70-pct'>` + data.title + `</td>
					</tr>

					<tr>
						<td>Текст</td>
						<td>` + data.text + `</td>
					</tr>

					<tr>
						<td>Дата создания</td>
						<td>` + data.created + `</td>
					</tr>

					<tr>
						<td>Изображение</td>
						<td><img style="width:300px;height:300px;" src='http://security.metamorphosiss.ru/upload/` + data.image + `'></td>
					</tr>
					
					<tr>
						<td>Категория</td>
						<td>` + data.category_name + ` ( ` + data.category_parent + ` )</td>
					</tr>
					
					<tr>
						<td>Автор</td>
						<td>` + data.author_name + `</td>
					</tr>

				</table>`;
				

				$("#page-content").html(read_one_product_html);
				changePageTitle("Просмотр публикации");
		});
    });

});