<?php

class Application_Form_AccountStatus extends Zend_Form
{

    public function init()
    {
        $this->setDecorators(array('FormElements','Form'));
        $this->setName('account-status');
        $this->setAttrib('class', 'account-status');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->setDecorators(array('ViewHelper'));
        $id->addFilter('Int')
            ->setRequired()
            ->addValidator('NotEmpty');
        
        $disabled = new Zend_Form_Element_Hidden('disabled');
        $disabled->setDecorators(array('ViewHelper'));
        $disabled->addFilter('Int')
            ->setRequired()
            ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setDecorators(array('ViewHelper'));
        $submit->setAttrib('id', 'submitbutton');
        
        $this->addElements(array($id, $disabled, $submit));
    }
}

