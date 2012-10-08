Period = function() {
    return {
        listElement: function() {
            return $('#period-list');
        },
        messageElement: function() {
            return $('#period-message');
        },
        submitTriggerForms: function() {
            return [
                $('#period-add')
            ];
        },
        submitTriggerFormsReload: function() {
            return [

            ];
        }
    }
};

$(document).ready(function() {
    period = new Period();
    layout.setupDataModel(period);
    layout.drawList(period);
});

