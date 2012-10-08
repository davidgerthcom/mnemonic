<?php

class Application_Form_RecurringBookingAdd extends Zend_Form
{
    public function init()
    {
        $this->setName('recurring-booking-add');
        $this->setDecorators(array('FormElements','Form'));
        $this->setAttrib('id', 'recurring-booking-add');

        $description = new Zend_Form_Element_Text('description');
        $description->setLabel('Beschreibung')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('NotEmpty')
               ->addErrorMessage('Beschreibung benötigt');

        $selectAccounts = $this->getAccountsForSelect();
        $fromAccountId = new Zend_Form_Element_Select('fromaccountid');
        $fromAccountId->setLabel('Von Konto')
               ->setRequired(true)
               ->addValidator('NotEmpty')
               ->addErrorMessage('Quellkonto benötigt')
               ->addMultiOptions($selectAccounts);

        $toAccountId = new Zend_Form_Element_Select('toaccountid');
        $toAccountId->setLabel('Nach Konto')
               ->setRequired(true)
               ->addValidator('NotEmpty')
               ->addErrorMessage('Zielkonto benötigt')
               ->addMultiOptions($selectAccounts);

        $amount = new Zend_Form_Element_Text('amount');
        $amount->setLabel('Betrag in Cent')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('Digits')
               ->addErrorMessage('Betrag ungültig');

        $start = new Zend_Form_Element_Text('start');
        $start->setLabel('Startzeitpunkt')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('date')
               ->addErrorMessage('Startzeitpunkt ungültig');

        $end = new Zend_Form_Element_Text('end');
        $end->setLabel('Endzeitpunkt')
               ->setRequired(true)
               ->addFilter('StripTags')
               ->addFilter('StringTrim')
               ->addValidator('date')
               ->addErrorMessage('Endzeitpunkt ungültig');

        $selectPeriods = $this->getPeriodsForSelect();
        $period = new Zend_Form_Element_Select('period');
        $period->setLabel('Zeitraum')
               ->setRequired(true)
               ->addValidator('NotEmpty')
               ->addErrorMessage('Zeitraum benötigt')
               ->addMultiOptions($selectPeriods);

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $submit->setLabel('Hinzufügen');

        $this->addElements(array(
            $description,
            $fromAccountId,
            $toAccountId,
            $amount,
            $start,
            $end,
            $period,
            $submit
        ));
    }

    private function getAccountsForSelect()
    {
        $selectAccounts = array();

        $accounts = new Application_Model_DbTable_Accounts();
        foreach ($accounts->fetchAll('disabled = 0') as $account) {
            $selectAccounts[$account->offsetGet('id')] = $account->offsetGet('name');
        }

        return $selectAccounts;
    }

    private function getPeriodsForSelect()
    {
        $selectPeriods = array();

        $periods = new Application_Model_DbTable_Periods();
        foreach ($periods->fetchAll() as $period) {
            $selectPeriods[$period->offsetGet('id')] = $period->offsetGet('description');
        }

        return $selectPeriods;
    }
}