$('#ipaddress').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13')
        window.location.href = '/game/internet/' + $('#ipaddress').val();
});

$("button").click(function()
{
    var attr = $( this ).attr("data-content");

    if( attr !== null )
    {

        if( attr !== undefined )
            $( "#" + attr  ).submit();
        else if( atrr !== "none" )
            $("form").submit();

        if( attr !== "none" )
            $( this ).attr("disabled", true );
    }
    else
        $( this ).attr("disabled", true );
})

$(document).ready(function()
{
    $('#scrollable').data("original_top",  $('#scrollable').css('top') );
    $('#scrollable').data("padding",  1028 );

    if( $(this).width() > ( 1370 ) )
        $(".fullscreen").fadeIn();
    else
        $(".fullscreen").fadeOut();
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
    {

        $(".fullscreen").fadeIn();

        if( $(this).scrollTop() < ( $(this).height() - ( $("#footer").height() ) ) - $('#scrollable').data("padding")  )
            $('#scrollable').css('top', $('#scrollable').data('last_scroll') );
        else
            $('#scrollable').animate({ top: ( $(this).height() - ( $("#footer").height() ) ) - $('#scrollable').data("padding") }, 6,  "linear", function(){});
    }
    else
    {
        $(".fullscreen").fadeOut();
        $('#scrollable').css('top',  $('#scrollable').data('original_top') );
    }

})