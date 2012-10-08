<?php

class Application_Model_DbTable_Accounts extends Zend_Db_Table_Abstract
{
    protected $_name = 'accounts';

    public function get($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Konto mit Nummer $id nicht gefunden.");
        }
        return $row->toArray();
    }

    public function add($name)
    {
        $data = array(
            'name' => $name
        );
        $this->insert($data);
    }

    public function update($id, $name)
    {
        $data = array(
            'name' => $name
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function updateStatus($id, $status)
    {
        $data = array(
            'disabled' => $status
        );
        $this->update($data, 'id = '. (int)$id);
    }

    public function delete($id)
    {
        $this->delete('id =' . (int)$id);
    }
}

