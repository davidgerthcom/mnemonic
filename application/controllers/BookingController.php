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
//        $bookings = new Application_Model_DbTable_Bookings();
        
        $this->view->bookings = array(1,2,3);//$bookings->fetchAll();
    }            
    
    /**
     * 
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        print('AddAction');
    }            
}







