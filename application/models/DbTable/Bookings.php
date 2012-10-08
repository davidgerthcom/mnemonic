<?php

class Application_Model_DbTable_Bookings extends Zend_Db_Table_Abstract
{

    protected $_name = 'bookings';

    public function get($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Buchung mit Nummer $id nicht gefunden.");
        }
        return $row->toArray();
    }
    
    public function add($description, $fromAccountId, $toAccountId, $amount)
    {
        $data = array(
            'description' => $description,
            'from_account_id' => $fromAccountId,
            'to_account_id' => $toAccountId,
            'amount' => $amount,
            'created' => new Zend_Db_Expr('CURRENT_TIMESTAMP')
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

