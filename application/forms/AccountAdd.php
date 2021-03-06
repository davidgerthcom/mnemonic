<?php

class Application_Form_AccountAdd extends Zend_Form
{
    public function init()
    {   
        $this->setName('account-add');
        $this->setDecorators(array('FormElements','Form'));
        $this->setAttrib('id', 'account-add');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty')
               ->addErrorMessage('Name benötigt');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Hinzufügen');
        
        $this->addElements(array($name, $submit));
    }
}

