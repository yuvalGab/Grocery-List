$(function() {
    
    //cerate new user functions
    //open create window
    $('#open-create').on('click', function() {
        $('.create-user').show(); 
    });
    //close create window
    $('#close-btn').on('click', function() {
        $('.create-user').hide();
        $('#user').focus();
    });
    //show create window if needed
    if ($('.create-user .error').length > 0) {
        $('.create-user').show(); 
        $('#new-user').focus();
    }

});