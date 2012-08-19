Booking = function() {
    return {
        listElement: function() {
            return $('#booking-list');
        },
        messageElement: function() {
            return $('#booking-message');
        },
        submitTriggerForms: function() {
            return [
                $('#booking-add')
            ];
        },
        submitTriggerFormsReload: function() {
            return [
                
            ];
        }
    }
};

$(document).ready(function() {
    booking = new Booking();
    layout.setupDataModel(booking);
    layout.drawList(booking);
});

