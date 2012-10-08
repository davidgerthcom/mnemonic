RecurringBooking = function() {
    return {
        listElement: function() {
            return $('#recurring-booking-list');
        },
        messageElement: function() {
            return $('#recurring-booking-message');
        },
        submitTriggerForms: function() {
            return [
                $('#recurring-booking-add')
            ];
        },
        submitTriggerFormsReload: function() {
            return [

            ];
        }
    }
};

$(document).ready(function() {
    recurringBooking = new RecurringBooking();
    layout.setupDataModel(recurringBooking);
    layout.drawList(recurringBooking);
});

