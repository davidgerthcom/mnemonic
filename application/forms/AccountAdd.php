<?php

class Application_Form_AccountAdd extends Zend_Form
{

    public function init()
    {
        $this->setName('account-add');
        $this->setAttrib('id', 'account-add');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $artist = new Zend_Form_Element_Text('name');
        $artist->setLabel('Name')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Hinzufügen');
        
        $this->addElements(array($id, $artist, $submit));
    }


}

