<?php

class RecurringBookingController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout()->disableLayout();
    }

    /**
     *
     */
    public function indexAction()
    {
        $formRecurringBookingAdd = new Application_Form_RecurringBookingAdd();
        $formRecurringBookingAdd->setAction($this->view->url(array('controller'=>'recurring-booking','action'=>'add')));

        $this->view->listUrl = $this->view->url(array('controller'=>'recurring-booking','action'=>'list'));
        $this->view->formRecurringBookingAdd = $formRecurringBookingAdd;
    }

    /**
     *
     */
    public function listAction()
    {
        $recurringBookings = new Application_Model_DbTable_RecurringBookings();

        $this->view->recurringBookings = $recurringBookings->fetchAll();
    }

    /**
     *
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();

        $formRecurringBookingAdd = new Application_Form_RecurringBookingAdd();
        if (!$formRecurringBookingAdd->isValid($arguments->getParams())) {
            $messages = array();
            foreach ($formRecurringBookingAdd->getMessages() as $elementMessage) {
                foreach ($elementMessage as $message) {
                    array_push($messages, $message);
                }
            }
            throw new Application_Model_AjaxException(implode(', ', $messages));
        }

        $recurringBookings = new Application_Model_DbTable_RecurringBookings();
        $recurringBookings->add(
            $arguments->getParam('description'),
            $arguments->getParam('fromaccountid'),
            $arguments->getParam('toaccountid'),
            $arguments->getParam('amount'),
            $arguments->getParam('start'),
            $arguments->getParam('end'),
            $arguments->getParam('period')
        );

        print('Buchung hinzugefügt');
    }
}







