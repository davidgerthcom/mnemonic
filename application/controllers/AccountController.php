<?php

class AccountController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $accounts = new Application_Model_DbTable_Accounts();
        
        $formAccountAdd = new Application_Form_AccountAdd();
        $formAccountAdd->setAction($this->view->url());
        $formAccountAdd->setAttrib('data-action', $this->view->url(array('controller'=>'index','action'=>'add')));
        
        $this->view->accounts = $accounts->fetchAll();
        $this->view->formAccountAdd = $formAccountAdd;
        
        $this->_helper->layout()->disableLayout();
    }
}







