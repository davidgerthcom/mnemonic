Layout = function() {
    return {
        setupNavigation: function() {
            var layout = this;
            
            $('#layout-navigation').find('li').click(function() {
                var href = $(this).data('href');
                var fadeTime = 500;
                layout.loadContent(href, fadeTime);
            });
            
        },
        loadContent: function(href, fadeTime) {
            $('#layout-loader-div').fadeIn(fadeTime);
            $('#layout-content-div').fadeOut(fadeTime, function() {
                $('#layout-content-div').load(href, function() {
                    $('#layout-loader-div').fadeOut(fadeTime);
                    $('#layout-content-div').fadeIn(fadeTime);
                });            
            });
        }
    }
};

$(document).ready(function() {
    layout = new Layout();
    layout.setupNavigation();
});

