<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Guestbook</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/custom.js"></script>
</head>
<body>

<header></header>

<div class="content">
<?=
$commentsData;
?>
</div>

<form action="">
    <label for="email">E-mail:</label>
    <input type="text" name="email">

    <label for="name">Name:</label>
    <input type="text" name="name">

    <label for="message">Message:</label>
    <textarea name="message"></textarea>

    <input type="submit">
</form>

<script>

    $( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        var msg = $(this).serialize();
        var msg_array = $(this).serializeArray();
        $.ajax({
            type: 'POST',
            url: 'query_response.php',
            data: msg,
            success: function(data) {
                /*var result = {};
                 $.each($('form').serializeArray(), function() {
                 result[this.name] = this.value;
                 });
                 */
//                $('.content').append('data');
                console.log(data);
            },
            error:  function(xhr){
                console.log('Возникла ошибка!');
            }
        });
    });

</script>
</body>
</html>