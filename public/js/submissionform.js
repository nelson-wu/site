$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault();

        $.post('login.php', $(this).serialize())
            .done(function(response) {
                if (response.text === 'success'){
                    $('#content').empty()
                        .load('/php/loadForm.php');
                }
            });
    });
});
