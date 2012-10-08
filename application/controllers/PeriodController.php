<?php

class PeriodController extends Zend_Controller_Action
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
        $formPeriodAdd = new Application_Form_PeriodAdd();
        $formPeriodAdd->setAction($this->view->url(array('controller'=>'period','action'=>'add')));

        $this->view->listUrl = $this->view->url(array('controller'=>'period','action'=>'list'));
        $this->view->formPeriodAdd = $formPeriodAdd;
    }

    /**
     *
     */
    public function listAction()
    {
        $periods = new Application_Model_DbTable_Periods();

        $this->view->periods = $periods->fetchAll();
    }

    /**
     *
     */
    public function addAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $arguments = $this->getRequest();

        $formPeriodAdd = new Application_Form_PeriodAdd();
        if (!$formPeriodAdd->isValid($arguments->getParams())) {
            $messages = array();
            foreach ($formPeriodAdd->getMessages() as $elementMessage) {
                foreach ($elementMessage as $message) {
                    array_push($messages, $message);
                }
            }
            throw new Application_Model_AjaxException(implode(', ', $messages));
        }

        $periods = new Application_Model_DbTable_Periods();
        $periods->add(
            $arguments->getParam('description'),
            $arguments->getParam('day'),
            $arguments->getParam('month'),
            $arguments->getParam('year')
        );

        print('Zeitraum hinzugefügt');
    }
}







