<?php

class Marketing {

    private $_db,
    $_data;

    public function __construct($user = null) {

        $this->_db = DB::getInstance();
    }

    public function update($fields = array(), $id = null) {
        if(!$id) {
            $id = $this->data()->marketing_id;
        }
     
        if(!$this->_db->update('marketing', 'marketing_id', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
        
    }

    public function create($fields) {
        if (!$this->_db->insert('marketing', $fields)) {
            throw new Exception('There was a problem inserting into the database');
        }
    }

    public function find($user = null)
    {
      if($user) {
        $field = (is_numeric($user)) ? 'id' : 'username';
        $data = $this->_db->get('marketing', array($field, '=', $user));
        if($data->count()) {
          $this->_data = $data->first();
          return true;
        }
      }
      return false;
    }
    public function findID($userid = null) {
      if($userid) {
        $field = (is_numeric($userid)) ? 'marketing_id' : 'marketing_name';
        $data = $this->_db->get('marketing', array($field, '=', $userid));
        if($data->count()) {
          $this->_data = $data->first();
          return true;
        }
      }
      return false;
    }

    public function exists()
    {
      return (!empty($this->_data)) ? true : false;
    }
    public function data()
  {
    return $this->_data;
  }
  public function delete($row, $id) {
    if(!$this->_db->deleteEvent('marketing', $row, $id )) {
    throw new Exception('There was a problem deleting this event');
    }
}

  public function totalMarketing() {
    $sql = "SELECT * FROM marketing";
    return $this->_db->query($sql);
  } 
  }





















?>