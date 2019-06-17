$("button").click(function()
{
    var attr = $( this ).attr("data-content");
    $( this ).attr("disabled", true );

    if( attr !== 'undefined' )
        $( "#" + attr  ).submit()
    else
        $("form").submit();
})


$(document).ready(function()
{

    $('#scrollable').data("original_top",  $('#scrollable').css('top') );
    $('#scrollable').data("padding",  1028 );
})

$(document).scroll(function() {


    if( $(this).height() > ( 1080 * 2 ) && $(this).width() > ( 1370 ) )
        if( $(this).scrollTop() < ( $(this).height() - ( $("#footer").height() ) ) -  $('#scrollable').data("padding")  )
            $('#scrollable').animate({ top: $(this).scrollTop() }, 12,  "linear", function(){});
        else
            $('#scrollable').animate({ top: ( $(this).height() - ( $("#footer").height() ) ) -  $('#scrollable').data("padding") }, 12,  "linear", function(){});
    else
        $('#scrollable').css('top', $('#scrollable').data('original_top') );

    $('#scrollable').data('last_scroll',  $(this).scrollTop() )
});

$( window ).resize( function () {
    if( $(this).width() > ( 1370 ) )
        if( $(this).scrollTop() < ( $(this).height() - ( $("#footer").height() ) ) - $('#scrollable').data("padding")  )
            $('#scrollable').css('top', $('#scrollable').data('last_scroll') );
        else
            $('#scrollable').animate({ top: ( $(this).height() - ( $("#footer").height() ) ) - $('#scrollable').data("padding") }, 6,  "linear", function(){});
    else
        $('#scrollable').css('top',  $('#scrollable').data('original_top') );
})

