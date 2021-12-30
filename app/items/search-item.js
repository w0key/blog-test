jQuery(function($){

    $(document).on('submit', '#search-product-form', function(){

        var keywords = $(this).find(":input[name='keywords']").val();

        $.getJSON("http://security.metamorphosiss.ru/news/search/" + keywords, function(data){

            readProductsTemplate(data, keywords);

            changePageTitle("Поиск публикаций: " + keywords);

        });

        return false;
    });

});