<?php
class View_Helper_AccountStatus extends Zend_View_Helper_Abstract
{
    public function AccountStatus($status)
    {
        return $status ? 'Inaktiv' : 'Aktiv';
    }
}
