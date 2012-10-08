<?php

class Application_Model_DbTable_Periods extends Zend_Db_Table_Abstract
{
    protected $_name = 'periods';

    public function get($id)
    {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Zeitraum mit Nummer $id nicht gefunden.");
        }
        return $row->toArray();
    }

    public function add($description, $day, $month, $year)
    {
        $data = array(
            'description' => $description,
            'day' => $day,
            'month' => $month,
            'year' => $year
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

    public function delete($id)
    {
        $this->delete('id =' . (int)$id);
    }
}

