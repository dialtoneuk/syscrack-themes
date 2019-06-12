var last_scroll = 0;

$(document).scroll(function() {


    if( $(this).height() > ( 1080 ) && $(this).width() > ( 1270 ) )
        if( $(this).height() > ( 1080 * 5 ) )
        {
            if ($(this).scrollTop() < $(this).height() - ($(this).height() / 10.37 ))
                $('#scrollable').animate({ top: $(this).scrollTop() }, 25,  "linear", function(){});
        }
        else
            if( $(this).scrollTop() < $(this).height() - ( $(this).height() / 5 ) )
                $('#scrollable').animate({ top: $(this).scrollTop() }, 25,  "linear", function(){});

    last_scroll = $(this).scrollTop();
});

$( window ).resize( function () {
    if( $(this).width() > ( 1270 ) )
        $('#scrollable').css('top', last_scroll - 124 );
    else
        $('#scrollable').css('top', 0 );
})

