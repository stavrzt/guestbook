jQuery(function($, undefined) {
    $('.pagination a').click(function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            data: {page:$(this).text(),
                   tre:"rest"},
            url: "/php/query_response.php",
            success: function(data){}
        });
    });
});
