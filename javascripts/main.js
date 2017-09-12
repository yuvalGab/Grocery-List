$(function() {
    
    //info window
    $('#info-btn').on('click', function() {
        $('.info').show();
    });
    $('#close-info').on('click', function() {
        $('.info').hide();
    });

    //pop-ups
    //log out message
    $('#logout-btn').on('click', function() {
        $('.log-out').show();
    });
    $('#close-logout').on('click', function() {
         $('.log-out').hide();
    });
    //delete selected message
    $('#delete-selected').on('click', function() {
        $('.delete').show();
        var deleteCount = 0;
        $('.item').each(function() {
            var isSelected = $(this).find('input').eq(1).val();
            var check = $(this).find('img');
            if(isSelected == 'true') {
                deleteCount++;
            }
        });
        $('#delete-msg').text("are you sure you want delete " + deleteCount + " items?");
    });
    $('#close-delete').on('click', function() {
        $('.delete').hide();
    });

    //hide error after some delay
    $('.error').delay(2000).fadeOut(1000);

    //select/unselect one item
    $('.item').on('click', function() {
        var itemId = $(this).find('input').eq(0).val();
        var selectInput = $(this).find('input').eq(1);
        var isSelected = selectInput.val();
        var user = $(this).find('input').eq(2).val();
        var check = $(this).find('img');
        $.ajax({
            method: "POST",
            url: "server/selectItem.php",
            data: { item: itemId, selected: isSelected, username: user  }
        })
        .done(function() {
            if (isSelected == "true") {
                selectInput.val(false);
                check.css({opacity: 0});
            } else {
                selectInput.val(true);
                check.css({opacity: 100});
            }
        });
    });

    //check if item is selected
    $('.item').each(function() {
        var isSelected = $(this).find('input').eq(1).val();
        var check = $(this).find('img');
        if(isSelected == 'true') {
             check.css({opacity: 100});
        }
    });


});
