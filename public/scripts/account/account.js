Account = function() {
    return {
        listElement: function() {
            return $('#account-list');
        },
        messageElement: function() {
            return $('#account-message');
        },
        submitTriggerForms: function() {
            return [
                $('#account-add')
            ];
        },
        submitTriggerFormsReload: function() {
            return [
                $(document).find('.account-status'),
                $(document).find('.account-edit')
            ];
        }
    }
};

$(document).ready(function() {
    account = new Account();
    layout.setupDataModel(account);
    layout.drawList(account);
});