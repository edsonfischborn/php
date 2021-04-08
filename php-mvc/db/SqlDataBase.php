<?php
class SqlDataBase{   
 
	private $pdo = null;      
	private $tabela = null;   
	 
	public function __construct($conexao, $tabela){   
		$this->pdo = $conexao;  
		$this->tabela = $tabela;
	}   

	private function buildSelect(array $fields, array $conditions){   
		$sql = "";   
		$fieldsValue = "";   
		$conditionsValue = "";   
			   
		foreach($fields as $value){ 
		  $fieldsValue .= $value . ', ';   
		}
   
		$fieldsValue = (substr($fieldsValue, -2) == ', ') ? trim(substr($fieldsValue, 0, (strlen($fieldsValue) - 2))) : $fieldsValue;  
  
		if(!empty($conditions)){
		  foreach($conditions as $key => $value){
			$conditionsValue .= $key . '=? AND ';   
		  }
  
		  $conditionsValue = (substr($conditionsValue, -4) == 'AND ') ? trim(substr($conditionsValue, 0, (strlen($conditionsValue) - 4))) : $conditionsValue;
		  $sql .= "SELECT " . $fieldsValue . " FROM {$this->tabela} WHERE " . $conditionsValue;  
		} else {
		  $sql .= "SELECT " . $fieldsValue . " FROM {$this->tabela}"; 
		}
		
		return trim($sql);   
	  } 
   
	private function buildInsert($arrayDados){   
		$sql = "";   
		$campos = "";   
		$valores = "";   
			   
		foreach($arrayDados as $chave => $valor){
		   $campos .= $chave . ', ';   
		   $valores .= '=?, ';   
		}  
			   
		$campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos;    
		$valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores ;    
			    
		$sql .= "INSERT INTO {$this->tabela} (" . $campos . ")VALUES(" . $valores . ")";   
			    
		return trim($sql);   
	}   
	  
	private function buildUpdate($arrayDados, $arrayCondicao){   
		$sql = "";   
		$valCampos = "";   
		$valCondicao = "";   
			     
		foreach($arrayDados as $chave => $valor){ 
		   $valCampos .= $chave . '=?, ';   
		}
			   
		foreach($arrayCondicao as $chave => $valor){
		   $valCondicao .= $chave . '=? AND ';   
		}
			   
		$valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos;      
		$valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao;    
			     
		$sql .= "UPDATE {$this->tabela} SET " . $valCampos . " WHERE " . $valCondicao;   
			   
		return trim($sql);   
	}   
	
	private function buildDelete($arrayCondicao){   
		$sql = "";   
		$valCampos= "";   
			 
		foreach($arrayCondicao as $chave => $valor){
			$valCampos .= $chave . '=? AND ';   
		}
			 
		$valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos ;    
			  
		$sql .= "DELETE FROM {$this->tabela} WHERE " . $valCampos;   
			 
		return trim($sql);   
	}  
	
	protected function select(array $fields = ['*'], array $conditions = [], $fetchAll = true){   
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
	 
	protected function insert($arrayDados){   
	   	try {   
			$sql = $this->buildInsert($arrayDados);   
			$stm = $this->pdo->prepare($sql);   
	
			$cont = 1;   
			foreach ($arrayDados as $valor){
				$stm->bindValue($cont, $valor);   
				$cont++;   
			}   
	
			$retorno = $stm->execute();   

			return $retorno;   
		} catch (PDOException $e) {   
			echo "Erro: " . $e->getMessage();   
		}   
	}   
	 
	protected function update($arrayDados, $arrayCondicao){   
	   	try {    
			$sql = $this->buildUpdate($arrayDados, $arrayCondicao);    
			$stm = $this->pdo->prepare($sql);   
		
			$cont = 1;   
			foreach ($arrayDados as $valor) { 
				$stm->bindValue($cont, $valor);   
				$cont++;   
			}
				
			foreach ($arrayCondicao as $valor){
				$stm->bindValue($cont, $valor);   
				$cont++;   
			}
		
			$retorno = $stm->execute();   
		
			return $retorno;   
	   	} catch (PDOException $e) {   
			echo "Erro: " . $e->getMessage();   
		}   
	}   
	 
	protected function delete($arrayCondicao){   
	   	try {   
			$sql = $this->buildDelete($arrayCondicao);   
			$stm = $this->pdo->prepare($sql);   
		
			$cont = 1;   
			foreach ($arrayCondicao as $valor){
				$stm->bindValue($cont, $valor);   
				$cont++;   
			} 
		
			$retorno = $stm->execute();   
		
			return $retorno;   
		} catch (PDOException $e) {   
			echo "Erro: " . $e->getMessage();   
		}   
	}   
   
	protected function getSQLGeneric($sql, $arrayParams=null, $fetchAll=TRUE){  
	   	try {   
			$stm = $this->pdo->prepare($sql);   
		
			if (!empty($arrayParams)){
				$cont = 1;   
				foreach ($arrayParams as $valor){
					$stm->bindValue($cont, $valor);   
					$cont++;   
				}  
			}   
		
			$stm->execute();   

			if($fetchAll){ 
				$dados = $stm->fetchAll(PDO::FETCH_OBJ);   
			}else {
				$dados = $stm->fetch(PDO::FETCH_OBJ);   
			}
		
			return $dados;   	
	   	} catch (PDOException $e) {   
			echo "Erro: " . $e->getMessage();   
	   	}   
	}   
  }  