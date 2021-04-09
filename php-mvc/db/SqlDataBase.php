<?php

/**
 * Generic sql class
 * Available without the modifications on http://www.devwilliam.com.br/php/crud-generico-com-php-e-pdo
 * @author Édson Fischborn 
 */
class SqlDataBase{   
 
	private $pdo = null;      
	private $table = null;   
	 
	public function __construct($connection, $table){   
		$this->pdo = $connection;  
		$this->table = $table;
	}   

	private function buildSelect(array $dataArray, array $conditionArray){   
		$sql = "";   
		$fields = "";   
		$condValues = "";   
			   
		foreach($dataArray as $value){ 
		  $fields .= $value . ', ';   
		}
   
		$fields = (substr($fields, -2) == ', ') ? trim(substr($fields, 0, (strlen($fields) - 2))) : $fields;  
  
		if(!empty($conditionArray)){
		  foreach($conditionArray as $key => $value){
			$condValues .= $key . '=? AND ';   
		  }
  
		  $condValues = (substr($condValues, -4) == 'AND ') ? trim(substr($condValues, 0, (strlen($condValues) - 4))) : $condValues;
		  $sql .= "SELECT " . $fields . " FROM {$this->table} WHERE " . $condValues;  
		} else {
		  $sql .= "SELECT " . $fields . " FROM {$this->table}"; 
		}
		
		return trim($sql);   
	  } 
   
	private function buildInsert(array $dataArray){   
		$sql = "";   
		$fields = "";   
		$values = "";   
			   
		foreach($dataArray as $key => $value){
		   $fields .= $key . ', ';   
		   $values .= '=?, ';   
		}  
			   
		$fields = (substr($fields, -2) == ', ') ? trim(substr($fields, 0, (strlen($fields) - 2))) : $fields;    
		$values = (substr($values, -2) == ', ') ? trim(substr($values, 0, (strlen($values) - 2))) : $values ;    
			    
		$sql .= "INSERT INTO {$this->table} (" . $fields . ")VALUES(" . $values . ")";   
			    
		return trim($sql);   
	}   
	  
	private function buildUpdate(array $dataArray, array $conditionArray){   
		$sql = "";   
		$fields = "";   
		$condValues = "";   
			     
		foreach($dataArray as $key => $value){ 
		   $fields .= $key . '=?, ';   
		}
			   
		foreach($conditionArray as $key => $value){
		   $condValues .= $key . '=? AND ';   
		}
			   
		$fields = (substr($fields, -2) == ', ') ? trim(substr($fields, 0, (strlen($fields) - 2))) : $fields;      
		$condValues = (substr($condValues, -4) == 'AND ') ? trim(substr($condValues, 0, (strlen($condValues) - 4))) : $condValues;    
			     
		$sql .= "UPDATE {$this->table} SET " . $fields . " WHERE " . $condValues;   
			   
		return trim($sql);   
	}   
	
	private function buildDelete(array $conditionArray){   
		$sql = "";   
		$condValues = "";   
			 
		foreach($conditionArray as $key => $value){
			$condValues .= $key . '=? AND ';   
		}
			 
		$condValues = (substr($condValues, -4) == 'AND ') ? trim(substr($condValues, 0, (strlen($condValues) - 4))) : $condValues ;    
			  
		$sql .= "DELETE FROM {$this->table} WHERE " . $condValues;   
			 
		return trim($sql);   
	}  
	
	protected function select(array $fields = ['*'], array $conditions = [], bool $fetchAll = true){   
		try {    
			$sql = $this->buildSelect($fields, $conditions);    
			$stm = $this->pdo->prepare($sql); 
		
			$cont = 1;   	 
			foreach ($conditions as $value){
				$stm->bindValue($cont, $value);   
				$cont++;   
			}
		
			$stm->execute(); 
			
			if($fetchAll){ 
				$data = $stm->fetchAll(PDO::FETCH_OBJ);   
			}else {
				$data = $stm->fetch(PDO::FETCH_OBJ);   
			}
		
			return $data;   
		} catch (PDOException $ex) {   
		 	echo "Exception: " . $ex->getMessage();  
		} 
	}    
	 
	protected function insert(array $dataArray){   
	   	try {   
			$sql = $this->buildInsert($dataArray);   
			$stm = $this->pdo->prepare($sql);   
	
			$cont = 1;   
			foreach ($dataArray as $value){
				$stm->bindValue($cont, $value);   
				$cont++;   
			}   
	
			return $stm->execute();     
		} catch (PDOException $e) {   
			echo "Exception " . $e->getMessage();   
		}   
	}   
	 
	protected function update(array $dataArray, array $conditionArray){   
	   	try {    
			$sql = $this->buildUpdate($dataArray, $conditionArray);    
			$stm = $this->pdo->prepare($sql);   
		
			$cont = 1;   
			foreach ($dataArray as $value) { 
				$stm->bindValue($cont, $value);   
				$cont++;   
			}
				
			foreach ($conditionArray as $value){
				$stm->bindValue($cont, $value);   
				$cont++;   
			}
		
			return $stm->execute(); 
	   	} catch (PDOException $e) {   
			echo "Exception: " . $e->getMessage();   
		}   
	}   
	 
	protected function delete(array $conditionArray){   
	   	try {   
			$sql = $this->buildDelete($conditionArray);   
			$stm = $this->pdo->prepare($sql);   
		
			$cont = 1;   
			foreach ($conditionArray as $value){
				$stm->bindValue($cont, $value);   
				$cont++;   
			} 
		
			return $stm->execute();   
		} catch (PDOException $e) {   
			echo "Exception: " . $e->getMessage();   
		}   
	}   
   
	protected function getSQLGeneric(string $sql, array $arrayParams=null, bool $fetchAll=TRUE){  
	   	try {   
			$stm = $this->pdo->prepare($sql);   
		
			if (!empty($arrayParams)){
				$cont = 1;   
				foreach ($arrayParams as $value){
					$stm->bindValue($cont, $value);   
					$cont++;   
				}  
			}   
		
			$stm->execute();   

			if($fetchAll){ 
				$data = $stm->fetchAll(PDO::FETCH_OBJ);   
			}else {
				$data = $stm->fetch(PDO::FETCH_OBJ);   
			}
		
			return $data;   	
	   	} catch (PDOException $e) {   
			echo "Exception: " . $e->getMessage();   
	   	}   
	}   
  }  