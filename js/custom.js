jQuery(function($, undefined) {
    $('.pagination').on('click', 'a',function () {
        event.preventDefault();
        if($(this).hasClass('currentPage')){return false}
        $.ajax({
            type: "POST",
            data: {page:$(this).text()},
            url: "/app/controller/PageDataController.php",
            success: function(data){
                data = JSON.parse(data);
                $('.content').html(data['comments']);
                $('.pagination').html(data['pagination']);
            }
        });
    });
});
