<?php

/**
 * 
 * PHP version 8
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 *
 * @package    Event class
 * @author     Daniel L. Sparks <dan@k3.local>
 * @copyright  2023 SPARKS 
 * 
 * 
 * */

class Event {

    private $_db,
    $_data;

    public function __construct($user = null)
    {
      $this->_db = DB::getInstance();
    }

    public function update($fields = array(), $id = null)
    {
      if (!$id) {
        $id = $this->data()->event_id;
      }
  
      if (!$this->_db->update('events', 'event_id', $id, $fields)) {
        throw new Exception('There was a problem updating.');
  
      }
    }

    public function allEvents() { 
      return $this->_db->getAll('events');
    }

    public function allEventsASC() {
      return $this->_db->query("SELECT * FROM events ORDER BY date ASC;");
    }

    public function countEvents() {
      $sql = "SELECT COUNT(*) FROM events";
      return $this->_db->query($sql);

    }

    public function eventByMonth($month, $year) {

          return $this->_db->query("SELECT * FROM events WHERE month = $month AND year = $year;");
        //return $this->_db->get('events', array('month', '=', $month));
 
        
    }
    public function create($fields)
    {
      if(!$this->_db->insert('events', $fields)) {
        throw new Exception('There was a problem creating an account.');
      }
    }
  
    public function find($user = null)
    {
      if($user) {
        $field = (is_numeric($user)) ? 'id' : 'username';
        $data = $this->_db->get('events', array($field, '=', $user));
        if($data->count()) {
          $this->_data = $data->first();
          return true;
        }
      }
      return false;
    }
    public function findID($userid = null) {
      if($userid) {
        $field = (is_numeric($userid)) ? 'event_id' : 'event_name';
        $data = $this->_db->get('events', array($field, '=', $userid));
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
    if(!$this->_db->deleteEvent('events', $row, $id )) {
    throw new Exception('There was a problem deleting this event');
    }
  }


}
?>