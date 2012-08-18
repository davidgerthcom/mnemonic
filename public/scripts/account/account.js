$(document).ready(function() {
    $('#layout-navigation').find('li').click(function() {
        var href = $(this).data('href');
        var fadeTime = 500;
        
        $('#layout-loader-div').fadeIn(fadeTime);
        $('#layout-content-div').fadeOut(fadeTime, function() {
            $('#layout-content-div').load(href, function() {
                $('#layout-loader-div').fadeOut(fadeTime);
                $('#layout-content-div').fadeIn(fadeTime);
            });            
        });
    });
});

