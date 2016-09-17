$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();

        $.post('/php/login.php', $(this).serialize())
            .done(function(response) {
                response = $.parseJSON(response);
                if (response.text == 'success'){
                    $('#content').empty()
                        .load('/php/loadForm.php');
                } else {
                    console.log('mismatch');
                }
            });
    });
});
