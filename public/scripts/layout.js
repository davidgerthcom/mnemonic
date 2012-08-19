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
        },
        setupDataModel: function(dataModel) {
            $.each(dataModel.submitTriggerForms(), function(key, formElement) {
                formElement.submit(function() {
                    objectApi.setupAjaxSubmitAction(dataModel, $(this));
                    return false;
                });
            });
            
        },
        drawList: function(dataModel) {
            dataModel.messageElement().removeClass('error-message');
            
            dataModel.listElement().load(dataModel.listElement().data('url'), function() {
                $.each(dataModel.submitTriggerFormsReload(), function(key, formElement) {
                    formElement.submit(function() {
                        objectApi.setupAjaxSubmitAction(dataModel, $(this));
                        return false;
                    });
                });
            });
        }
    }
};

$(document).ready(function() {
    layout = new Layout();
    layout.setupNavigation();
});

