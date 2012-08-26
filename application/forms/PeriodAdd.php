<?php

class Application_Form_PeriodAdd extends Zend_Form
{
    public function init()
    {   
        $this->setName('period-add');
        $this->setDecorators(array('FormElements','Form'));
        $this->setAttrib('id', 'period-add');
        
        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('Name')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty')
               ->addErrorMessage('Beschreibung benötigt');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Hinzufügen');
        
        $this->addElements(array($description, $submit));
    }
}

