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

        $day = new Zend_Form_Element_Text('day');
        $day->setLabel('Anzahl Tage')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('Digits')
               ->addErrorMessage('Anzahl Tage ungültig');

        $month = new Zend_Form_Element_Text('month');
        $month->setLabel('Anzahl Monate')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('Digits')
               ->addErrorMessage('Anzahl Monate ungültig');

        $year = new Zend_Form_Element_Text('year');
        $year->setLabel('Anzahl Jahre')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('Digits')
               ->addErrorMessage('Anzahl Jahre ungültig');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Hinzufügen');

        $this->addElements(array($description, $day, $month, $year, $submit));
    }
}

