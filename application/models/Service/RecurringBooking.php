<?php

class Application_Model_Service_RecurringBooking
{
    public function getRecurringBookingsForActualMonth()
    {
        $nowExpression = new Zend_Db_Expr('NOW()');

        $recurringBookings = new Application_Model_DbTable_RecurringBookings();
        $scheduledBookings = $recurringBookings->fetchAll('start > ' . $nowExpression);

        foreach ($scheduledBookings as $scheduledBooking) {
            var_dump($scheduledBooking->description);
        }
    }
}

