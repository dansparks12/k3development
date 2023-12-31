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
 * @package    Validation class
 * @author     Daniel L. Sparks <dan@k3.local>
 * @copyright  2023 SPARKS 
 * 
 * 
 * */

class Validate{
	private $_passed = false,
			$_errors = array(),
			$_db = null;
			
		public function __construct(){
			$this->_db = DB::getInstance();
			
		}
		public function check($source, $items = array()){
			foreach($items as $item =>$rules){
				foreach($rules as $rule=> $rule_value){
					$value = trim($source[$item]);
					$item = escape($item);
					/*echo"{$item} {$rule} must be {$rule_value}<br>";*/
					
					/*check to see if the rule exists*/
					if($rule === 'required' && empty($value)){
						$this->addError("{$item} is required");
						
					} else if(!empty($value)) {
						switch($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							
							}
						
						break;
						
						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$item} can not be longer than {$rule_value} characters.");
								}
							
						
						break;
						
						case 'matches':
							if($value != $source[$rule_value]){
								$this->addError("{$rule_value}s must match");
							
							
							}
						
						break;
						
						case 'unique':
							$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()){
									$this->addError("{$item} already exists.");
								
								}
						
						break;
						
						}
					
						
					}
				}
				
			}
			
			if(empty($this->_errors)){
				$this->_passed = true;
				
			}
			return $this;
		}
		private function addError($error){
			$this->_errors[] = $error;
		
		}
		public function errors(){
			return $this->_errors;
		}
		public function passed(){
			return $this->_passed;
		}
		
		
		
}





?>