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
 * @package    Database class
 * @author     Daniel L. Sparks <dan@k3.local>
 * @copyright  2023 SPARKS 
 * 
 * 
 * */
class DB {
    private static $_instance = NULL;
    private $_pdo,
               $_query,
               $_error = false,
               $_results,
               $_count  = 0;

	
	private function __construct(){
	try {
		$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';
									 dbname=' . Config::get('mysql/db'), 
							  Config::get('mysql/username'),
							  Config::get('mysql/password')
		);
	} catch(PDOException $e){
		die($e->getMessage());
	}
}

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array()){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach($params as $param){
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
            else
            {
                $this->_error = TRUE;
            }
        }
        return $this;
    }

    public function action($action, $table, $where = array()) {
        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];
            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;
    }
    public function actionAll($action, $table) {
        $sql = "{$action} FROM {$table}"; 
        return $this->query($sql);

    }
        
    

    public function getAll($table) {
        return $this->actionAll('SELECT * ', $table);
    }

    public function get($table, $where){
        return $this->action('SELECT * ', $table, $where);
    }

    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
        
    }

    public function deleteEvent($table, $row, $id) { 
        $sql = "DELETE FROM {$table} WHERE {$row} = {$id}";
        if(!$this->query($sql)->error()){
            return true;
        }
        
        return false;

    }
	
	public function insert($table, $fields = array()){
        
			$keys = array_keys($fields);
			$values = '';
			$x = 1;
			
			foreach($fields as $field){
				$values .= '?';
				if($x < count($fields)){
					$values .= ', ';
					
				}
				$x++;
			}
			$sql = "INSERT INTO {$table}(`". implode('`, `', $keys) . "`) VALUES({$values})";
			if(!$this->query($sql, $fields)->error()){
				return true;
			}
			
			return false;
    }
	
	public function results(){
		return $this->_results;
	}
	
	public function update($table, $row, $id, $fields){
		$set = '';
		$x = 1;
		
		foreach($fields as $name => $value){
			$set .= "{$name} =?";
			if($x < count($fields)){
				$set .= ', ';
			}
			$x++;
		}
		
		$sql = "UPDATE {$table} SET {$set} WHERE {$row} = {$id}";
		
		if(!$this->query($sql,$fields)->error()){
			return true;
		
		}
		return false;
	}
	
	public function first(){
		return $this->results()[0];
	
	}


    public function error(){
        return $this->_error;
    }

    public function count(){
        return $this->_count;
    }


}

?>