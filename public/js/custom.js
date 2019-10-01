$(document).ready(function(){
    
    var textarea = $('textarea');
    function autoExpand(){
        textarea.attr("rows", "1");
        var rows = Math.round(textarea[0].scrollHeight/35.5);
        textarea.attr("rows", rows);
    }
    
    $('textarea').keyup(autoExpand);
    
    $('#search').focus(function(){
        $('.search-div').addClass("bg-white");
        $('.search-div').addClass("border");
        $('.search-div').addClass("border-info");
        $('.search-div').removeClass("border-0");
    });
    $('#search').blur(function(){
        $('.search-div').css('background-color', '#E6ECF0')
        $('.search-div').addClass("border-0");
        $('.search-div').removeClass("bg-white");
        $('.search-div').removeClass("border");
        $('.search-div').removeClass("border-info");
    });

});

