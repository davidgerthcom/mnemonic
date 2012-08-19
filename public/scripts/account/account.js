Account = function() {
    return {
        accountUrl: $('#account-add').attr('action'),
        addForm: $('#account-add'),
        editForm: $(document).find('.account-edit'),
        setup: function() {
            var account = this;
            account.addForm.submit(function() {
                ajaxUrl = $(this).data('action');
                data = $(this).serialize();
                account.add(ajaxUrl, data);
                
                return false;
            });
            
            account.editForm.submit(function() {
                ajaxUrl = $(this).data('action');
                data = $(this).serialize();
                account.update(ajaxUrl, data);
                
                return false;
            });
        },
        add: function(url, data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function() {
                    layout.loadContent(account.accountUrl, 500);
                },
                error: function() {
                    alert('Fehler');
                }
            });
        },
        update: function(url, data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function() {
                    layout.loadContent(account.accountUrl, 500);
                },
                error: function() {
                    alert('Fehler');
                }
            });
        }
    }
};

$(document).ready(function() {
    account = new Account();
    account.setup();
});

