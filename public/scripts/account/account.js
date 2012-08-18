Account = function() {
    return {
        addForm: $('#account-add'),
        setup: function() {
            var account = this;
            account.addForm.submit(function() {
                account.add($(this).serialize());
                
                layout.loadContent($(this).attr('action'), 500);
                return false;
            });
        },
        add: function(data) {
            alert(data);
        }
    }
};

$(document).ready(function() {
    account = new Account();
    account.setup();
});

