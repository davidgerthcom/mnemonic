<?php
class View_Helper_AccountStatusForm extends Zend_View_Helper_Abstract
{
    public function AccountStatusForm($actionUrl, $id, $disabled)
    {
        $accountStatusForm = new Application_Form_AccountStatus();
        $accountStatusForm->setAction($actionUrl);
        
        $accountStatusForm->getElement('id')->setValue($id);
        $accountStatusForm->getElement('disabled')->setValue(!$disabled);
        $buttonLabel = $disabled ? 'Aktivieren' : 'Deaktivieren';
        $accountStatusForm->getElement('submit')->setLabel($buttonLabel);
        
        return $accountStatusForm;
    }
}
