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
        $formAccountAdd = new Application_Form_AccountAdd();
        $formAccountAdd->setAction($this->view->url(array('controller'=>'account','action'=>'add')));
        
        $this->view->listUrl = $this->view->url(array('controller'=>'account','action'=>'list'));
        $this->view->formAccountAdd = $formAccountAdd;
    }
    
    /**
     * 
     */
    public function listAction()
    {
        $accounts = new Application_Model_DbTable_Accounts();
        
        $this->view->accounts = $accounts->fetchAll();
        $this->view->editAction = $this->view->url(array('controller'=>'account','action'=>'edit'));
        $this->view->statusAction = $this->view->url(array('controller'=>'account','action'=>'status'));
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
            $messages = array();
            foreach ($formAccountAdd->getMessages() as $elementMessage) {
                foreach ($elementMessage as $message) {
                    array_push($messages, $message);
                }
            }
            throw new Application_Model_AjaxException(implode(', ', $messages));
        }
        
        $accounts = new Application_Model_DbTable_Accounts();
        $accounts->add($arguments->getParam('name'));
        
        print('Konto hinzugefügt');
    }

    /**
     * 
     */
    public function editAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();
        
        if (!$arguments->getParam('id')) {
            throw new Application_Model_AjaxException('ID benötigt');
        }
        
        if (!$arguments->getParam('name')) {
            throw new Application_Model_AjaxException('Name benötigt');
        }
          
        $accounts = new Application_Model_DbTable_Accounts();
        $accounts->update($arguments->getParam('id'), $arguments->getParam('name'));
        
        print('Konto gespeichert');
    }

    /**
     * 
     */
    public function statusAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();
        
        $formAccountStatus = new Application_Form_AccountStatus();
        if (!$formAccountStatus->isValid($arguments->getParams())) {
            throw new Application_Model_AjaxException('Es ist ein interner Fehler aufgetreten');
        }
          
        $accounts = new Application_Model_DbTable_Accounts();
        $accounts->updateStatus($arguments->getParam('id'), $arguments->getParam('disabled'));
        
        print('Konto Status geändert');
    }
}







