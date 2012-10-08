<?php

class DashboardController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout()->disableLayout();
    }

    public function indexAction()
    {
        $this->view->monthlyOverviewUrl = $this->view->url(array('controller'=>'dashboard','action'=>'monthly-overview'));
    }

    public function monthlyOverviewAction()
    {
        $recurringBookingService = new Application_Model_Service_RecurringBooking();

        $this->view->recurringBookingsForActualMonth = $recurringBookingService->getRecurringBookingsForActualMonth();
    }
}