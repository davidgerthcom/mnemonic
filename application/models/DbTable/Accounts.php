<?php

class Application_Model_DbTable_Accounts extends Zend_Db_Table_Abstract
{

    protected $_name = 'accounts';

    public function getAccount($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Konto mit Nummer $id nicht gefunden.");
        }
        return $row->toArray();
    }
    
    public function addAccount($name)
    {
        $data = array(
            'name' => $name
        );
        $this->insert($data);
    }
    
    public function updateAccount($id, $name)
    {
        $data = array(
            'name' => $name
        );
        $this->update($data, 'id = '. (int)$id);
    }
    
    public function updateAccountStatus($id, $status)
    {
        $data = array(
            'disabled' => $status
        );
        $this->update($data, 'id = '. (int)$id);
    }
    
    public function deleteAccount($id)
    {
        $this->delete('id =' . (int)$id);
    }
}

