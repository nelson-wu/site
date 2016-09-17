$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();
        console.log($(this).serialize());

        $.post('/php/login.php', $(this).serialize())
            .done(function(response) {
                console.log(response);
                if (response.text === 'success'){
                    $('#content').empty()
                        .load('/php/loadForm.php');
                }
            });
    });
});
