<?php
class View_Helper_AccountEditForm extends Zend_View_Helper_Abstract
{
    public function AccountEditForm($actionUrl, $id, $name)
    {
        $accountEditForm = new Application_Form_AccountEdit();
        $accountEditForm->setAction($actionUrl);
        
        $accountEditForm->getElement('id')->setValue($id);
        $accountEditForm->getElement('name')->setValue($name);
        
        return $accountEditForm;
    }
}
