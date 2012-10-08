<?php

class Application_Form_AccountEdit extends Zend_Form
{

    public function init()
    {
        $this->setDecorators(array('FormElements','Form'));
        $this->setName('account-edit');
        $this->setAttrib('class', 'account-edit');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->setDecorators(array('ViewHelper'));
        $id->addFilter('Int')
            ->setRequired()
            ->addValidator('NotEmpty');
        
        $name = new Zend_Form_Element_Text('name');
        $name->setDecorators(array('ViewHelper'));
        $name->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setDecorators(array('ViewHelper'));
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Speichern');
        
        $this->addElements(array($id, $name, $submit));
    }
}

