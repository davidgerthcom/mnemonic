<?php

class AccountController extends Zend_Controller_Action
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
        
        $accounts = new Application_Model_DbTable_Accounts();
        
        $formAccountAdd = new Application_Form_AccountAdd();
        $formAccountAdd->setAction($this->view->url());
        $formAccountAdd->setAttrib('data-action', $this->view->url(array('controller'=>'account','action'=>'add')));
        
        $this->view->accounts = $accounts->fetchAll();
        $this->view->formAccountAdd = $formAccountAdd;
        $this->view->editAction = $this->view->url(array('controller'=>'account','action'=>'edit'));
    }

    /**
     * 
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();
        
        $formAccountAdd = new Application_Form_AccountAdd();
        if (!$formAccountAdd->isValid($arguments->getParams())) {
            throw new Exception('Name benötigt');
        }
        
        $accounts = new Application_Model_DbTable_Accounts();
        $accounts->addAccount($arguments->getParam('name'));
    }

    /**
     * 
     */
    public function editAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();
        
        if (!$arguments->getParam('id')) {
            throw new Exception('ID benötigt');
        }
        
        if (!$arguments->getParam('name')) {
            throw new Exception('Name benötigt');
        }
          
        $accounts = new Application_Model_DbTable_Accounts();
        $accounts->updateAccount($arguments->getParam('id'), $arguments->getParam('name'));
    }
}







