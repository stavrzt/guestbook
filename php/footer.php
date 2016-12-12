<form action="">
    <label for="email">E-mail:</label>
    <input type="text" name="email">

    <label for="name">Name:</label>
    <input type="text" name="name">

    <label for="message">Message:</label>
    <textarea name="message"></textarea>

    <input type="submit">
</form>

<br>

<footer>FOOTER</footer>


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