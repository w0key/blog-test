function readProductsTemplate(data, keywords){

    var read_products_html=`
        <form id='search-product-form' action='#' method='post'>
            <div class='input-group pull-left w-30-pct'>
                <input type='text' value='` + keywords + `' name='keywords' class='form-control product-search-keywords' placeholder='Поиск публикаций...' />

                <span class='input-group-btn'>
                    <button type='submit' class='btn btn-default' type='button'>
                        <span class='glyphicon glyphicon-search'></span>
                    </button>
                </span>

            </div>
        </form>


		<div id='create-product' class='btn btn-primary pull-right m-r-10px m-b-15px create-product-button'>
			<span class='glyphicon glyphicon-plus'></span> Создание публикации
		</div>
		
		<div id='create-category' class='btn btn-primary pull-right m-r-10px m-b-15px create-category-button'>
			<span class='glyphicon glyphicon-plus'></span> Создание категории
		</div>
		
		<div id='create-author' class='btn btn-primary pull-right m-r-10px m-b-15px create-author-button'>
			<span class='glyphicon glyphicon-plus'></span> Создание автора
		</div>


			<table class='table table-bordered table-hover'>

				<tr>
					<th class='w-5-pct'>ID</th>
					<th class='w-10-pct'>Заголовок</th>
					<th class='w-10-pct'>Категория</th>
					<th class='w-15-pct'>Автор</th>
					<th class='w-10-pct text-align-center'>Действие</th>
				</tr>`;

					$.each(data, function(key, val) {


						read_products_html+=`
							<tr>

								<td>` + val.id + `</td>
								<td>` + val.title + `</td>
								<td>` + val.category_name + `</td>
								<td>` + val.author_name + `<img style="float:right;width:50px;height:50px;" src='http://security.metamorphosiss.ru/upload/` + val.author_image + `'></td>
								
								<td>
									<button style="width: 100%;" class='btn btn-primary m-r-10px read-one-product-button' data-id='` + val.id + `'>
										<span class='glyphicon glyphicon-eye-open'></span> Просмотр
									</button>
								</td>

							</tr>`;
					});

			read_products_html+=`</table>`;

    $("#page-content").html(read_products_html);
}