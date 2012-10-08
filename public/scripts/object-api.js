ObjectApi = function() {
    return {
        setupAjaxSubmitAction: function(dataModel, element) {
            var objectApi = this;
            
            ajaxUrl = element.attr('action');
            data = element.serialize();
            objectApi.ajaxAction(dataModel, ajaxUrl, data);

            return false;
        },
        ajaxAction: function(dataModel, url, data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function() {
                    layout.drawList(dataModel);
                },
                error: function() {
                    dataModel.messageElement().addClass('error-message');
                },
                complete: function(request) {
                    dataModel.messageElement().html(request.responseText);
                } 
            });
        }
    }
};

$(document).ready(function() {
    objectApi = new ObjectApi();
});

