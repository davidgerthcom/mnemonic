<?php

class BookingController extends Zend_Controller_Action
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
        $formBookingAdd = new Application_Form_BookingAdd();
        $formBookingAdd->setAction($this->view->url(array('controller'=>'booking','action'=>'add')));
        
        $this->view->listUrl = $this->view->url(array('controller'=>'booking','action'=>'list'));
        $this->view->formBookingAdd = $formBookingAdd;
    }
    
    /**
     * 
     */
    public function listAction()
    {
        $bookings = new Application_Model_DbTable_Bookings();
        
        $this->view->bookings = $bookings->fetchAll();
    }            
    
    /**
     * 
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();
        
        $formBookingAdd = new Application_Form_BookingAdd();
        if (!$formBookingAdd->isValid($arguments->getParams())) {
            $messages = array();
            foreach ($formBookingAdd->getMessages() as $elementMessage) {
                foreach ($elementMessage as $message) {
                    array_push($messages, $message);
                }
            }
            throw new Application_Model_AjaxException(implode(', ', $messages));
        }
        
        $accounts = new Application_Model_DbTable_Bookings();
        $accounts->add(
            $arguments->getParam('description'),
            $arguments->getParam('fromaccountid'),
            $arguments->getParam('toaccountid'),
            $arguments->getParam('amount')
        );
        
        print('Buchung hinzugefügt');
    }            
}







