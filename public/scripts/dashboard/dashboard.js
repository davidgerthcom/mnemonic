Dashboard = function() {
    return {
        listElement: function() {
            return $('#dashboard-monthly-overview');
        },
        messageElement: function() {
            return $('#dashboard-message');
        },
        submitTriggerForms: function() {
            return [
            ];
        },
        submitTriggerFormsReload: function() {
            return [
            ];
        }
    }
};

$(document).ready(function() {
    dashboard = new Dashboard();
    layout.setupDataModel(dashboard);
    layout.drawList(dashboard);
});