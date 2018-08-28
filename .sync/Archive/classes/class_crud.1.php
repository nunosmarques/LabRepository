<?php  require "LabApp.php";

class CRUD extends LabApp{	
	//DONE
	function select($table, $where_sign, $array_filter, $where_condition, $page_num) {
		$result = array();
		$prep = array();
		$string = "";

		//Prepara a query
		if(sizeof($array_filter) > 0){
			//Verifica se todas as posições do array vem preenchidas
			$count = 0;
			foreach( $array_filter as $rows => $row){	
				if(empty($rows) || empty($row)){	
					$count++;
				}
			}

			if($count > 0){
				goto a;
				$result = false; 
			}else{	
				foreach($array_filter as $k => $v ){
					$prep[':'.$k] = $v;
					$string .= $k . ' '.$where_sign.' :' . $k .' '.$where_condition . ' ';
				}
				
				if(sizeof($where_condition) > 0){
					if($where_condition == "AND"){
						$string = substr($string, 0, -4);
					}else{
						$string = substr($string, 0, -3);
					}
				}
				
				$query = "SELECT * FROM $table WHERE ".$string." AND deleted = 'N' LIMIT 0, ".$page_num."";
			
				$sql = $this->conn->prepare($query);
			
				//Faz bind por tipo
				foreach($prep as $k => $v ) {
					if(is_int($v)){
						$sql->bindValue($k, $v , PDO::PARAM_INT);
					}
					
					if(is_string($v) || is_float($v) ){
						$sql->bindValue($k, $v , PDO::PARAM_STR);
					}
				}
				
				try {			
					$sql->execute();
					$result = $sql->fetchAll(PDO::FETCH_ASSOC);	
				}catch(PDOException $ex){
					echo '<script> 
							alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
						  </script>';
				}
				
			}
		}else{
			a:			
			$query = "SELECT * FROM ".$table." WHERE deleted = 'N' LIMIT 0, ".$page_num."";

			$sql = $this->conn->prepare($query);
			
			try {			
				$sql->execute();
				$result = $sql->fetchAll(PDO::FETCH_ASSOC);	
			}catch(PDOException $ex){
				echo '<script> 
						alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
					  </script>';
			}
		}
		return $result;
    }
    
	//DONE
    function update($table, $array_filter, $where_sign, $where_condition, $array_columns) {
		$string_c = "";
		$string_w = "";
		$filter = array();
		$columns = array();
		
		foreach($array_columns as $k => $v ){
			$columns[':'.$k] = $v;
			$string_c .= $k . ' = :' . $k.', ';
		}
		
		$string_c = substr($string_c, 0, -2);
		
		foreach($array_filter as $k => $v ){
			$filter[':'.$k.'w'] = $v;
			$string_w .= $k . ' '.$where_sign.' :' . $k.'w '.$where_condition.' ';
		}
		
		
		if(!empty($where_condition)){
			if(sizeof($where_condition) > 0){
				if($where_condition == "OR"){
					$string_w = substr($string_w, 0, -3);
				}else{
					$string_w = substr($string_w, 0, -4);
				}
			}
		}
		
		$query = "UPDATE ".$table." SET ".$string_c." WHERE ".$string_w;
		
		$sql = $this->conn->prepare($query);
		
		//Faz bind por tipo
		foreach($columns as $k => $v ) {
			if(is_int($v)){
				$sql->bindValue($k, $v , PDO::PARAM_INT);
			}
			
			if(is_string($v) || is_float($v) ){
				$sql->bindValue($k, $v , PDO::PARAM_STR);
			}
		}
		
		foreach($filter as $k => $v ) {
			if(is_int($v)){
				$sql->bindValue($k, $v , PDO::PARAM_INT);
			}
			
			if(is_string($v) || is_float($v) ){
				$sql->bindValue($k, $v , PDO::PARAM_STR);
			}
		}
		
		try {	
		
			$sql->execute();	
			$result = true;
		}catch(PDOException $ex){
			$result = false;
			echo '<script> 
					alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
				  </script>';
		}
		
		return $result;
    }
    
	//DONE
    function delete($table, $filter, $where_sign, $where_condition) {
		$query = "";
		$string = "";
		$state = false;
		if(sizeof($filter) > 0){
			
			foreach($filter as $k => $v ){
				$prep[':'.$k] = $v;
				$string .= $k . ' '.$where_sign.' :' . $k .' '.$where_condition . ' ';
			}
			if(sizeof($where_condition) > 0){
				if($where_condition == "OR"){
					$string = substr($string, 0, -3);
				}else{
					$string = substr($string, 0, -4);
				}
			}
			$query = "UPDATE ".$table." SET deleted = 'S' WHERE ".$string;
			$sql = $this->conn->prepare($query);
			
			//Faz bind por tipo
			foreach($prep as $k => $v ) {
				if(is_int($v)){
					$sql->bindValue($k, $v , PDO::PARAM_INT);
				}
				
				if(is_string($v) || is_float($v) ){
					$sql->bindValue($k, $v , PDO::PARAM_STR);
				}
			}
			
		}else{
			$state = false;
		}
		
		
		try {		
			$sql->execute();
			$state = true;
							
		}catch(PDOException $ex){
			$state = false;
		}
			
        return $state;
    }
    
	//DONE
    function undelete($table, $filter, $where_sign, $where_condition) {
		$query = "";
		$string = "";
		$state = false;
		if(sizeof($filter) > 0){
			
			foreach($filter as $k => $v ){
				$prep[':'.$k] = $v;
				$string .= $k . ' '.$where_sign.' :' . $k .' '.$where_condition . ' ';
			}
			if(sizeof($where_condition) > 0){
				if($where_condition == "OR"){
					$string = substr($string, 0, -3);
				}else{
					$string = substr($string, 0, -4);
				}
			}
			$query = "UPDATE ".$table." SET deleted = 'N' WHERE ".$string;
			$sql = $this->conn->prepare($query);
			
			//Faz bind por tipo
			foreach($prep as $k => $v ) {
				if(is_int($v)){
					$sql->bindValue($k, $v , PDO::PARAM_INT);
				}
				
				if(is_string($v) || is_float($v) ){
					$sql->bindValue($k, $v , PDO::PARAM_STR);
				}
			}
			
		}else{
			$state = false;
		}
		
		
		try {		
			$sql->execute();
			$state = true;
							
		}catch(PDOException $ex){
			$state = false;
		}
			
        return $state;
    }
	
	//DONE
    function insert($table, $columns) {
		$prep = array();
		$key = array();
		$key[0] = false;
		
		$state = $this->checkNulls($table , $columns);
		
		if(!$state){
			echo '<script> 
					alert("Ops! Não preencheu todos os campos obrigatórios!");
				  </script>';	
			 exit;
		}
		//prepara o array recebido para o bindValue
		foreach($columns as $k => $v ) {
			$prep[':'.$k] = $v;
		}
		
		//Prepara a query
		$sql = $this->conn->prepare("INSERT INTO ".$table." (".implode(', ',array_keys($columns)).") VALUES (".implode(', ',array_keys($prep)).")");
		
		//Faz bind por tipo
		foreach($prep as $k => $v ) {
			if(is_int($v)){
				$sql->bindValue($k, $v , PDO::PARAM_INT);
			}
			
			if(is_string($v) || is_float($v) ){
				$sql->bindValue($k, $v , PDO::PARAM_STR);
			}
		}
		
		//Tenta executar, se falhar retorna 'false' e a mensagem de erro
		try{
			$sql->execute($prep);
			$key[0] = true; 
			$key[1] = $this->conn->lastInsertId();
		}catch(PDOException $erro){
			$key[0] = false;
			$key[1] = $erro->getMessage();
		}		
		
        return $key;
    }

	private function checkNulls($table, $data){
		$state = true;
		
		switch($table){
			//CONCELHO
			case "concelho":
				if (array_key_exists('distrito_iddistrito', $data)) {
					if(empty($data['distrito_iddistrito']) || !is_numeric($data['distrito_iddistrito'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('distrito_iddistrito', $data)) {
						$state = false;
				}
				break;
			//EQUIPAMENTO
			case "equipamento":
				if (array_key_exists('equipamentotipo_idequipamentotipo', $data)) {
					if(empty($data['equipamentotipo_idequipamentotipo']) || !is_numeric($data['equipamentotipo_idequipamentotipo'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('equipamentotipo_idequipamentotipo', $data)) {
						$state = false;
				}
				break;
			//INDIVIDUO_AREA
			case "individuoarea":						
				if (array_key_exists('individuo_idindividuo', $data)){
					if(empty($data['individuo_idindividuo']) || !is_numeric($data['individuo_idindividuo'])){
						$state = false;
					}
				}
				
				if (array_key_exists('area_idarea', $data)) {
					if(empty($data['area_idarea']) || !is_numeric($data['area_idarea'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('individuo_idindividuo', $data)
					|| !array_key_exists('area_idarea', $data)) {
						$state = false;
				}
				break;
			//INSTITUIÇÃO
			case "instituicao":
				if (array_key_exists('instituicaotipo_idinstituicaotipo', $data)){
					if(empty($data['instituicaotipo_idinstituicaotipo']) || !is_numeric($data['instituicaotipo_idinstituicaotipo'])){
						$state = false;
					}
				}
				
				if (array_key_exists('concelho_idconcelho', $data)) {
					if(empty($data['concelho_idconcelho']) || !is_numeric($data['concelho_idconcelho'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('instituicaotipo_idinstituicaotipo', $data)
					|| !array_key_exists('concelho_idconcelho', $data)) {
						$state = false;
				}
				break;
			//LABORATORIO
			case "laboratorio":
				if (array_key_exists('instituicao_idinstituicao', $data)){
					if(empty($data['instituicao_idinstituicao']) || !is_numeric($data['instituicao_idinstituicao'])){
						$state = false;
					}
				}
				
				if (array_key_exists('concelho_idconcelho', $data)) {
					if(empty($data['concelho_idconcelho']) || !is_numeric($data['concelho_idconcelho'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('instituicao_idinstituicao', $data)
					|| !array_key_exists('concelho_idconcelho', $data)) {
						$state = false;
				}				
				break;
			//LABORATORIO_AREA
			case "laboratorioarea":
				if (array_key_exists('laboratorio_idlaboratorio', $data)){
					if(empty($data['laboratorio_idlaboratorio']) || !is_numeric($data['laboratorio_idlaboratorio'])){
						$state = false;
					}
				}
				
				if (array_key_exists('area_idarea', $data)) {
					if(empty($data['area_idarea']) || !is_numeric($data['area_idarea'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('laboratorio_idlaboratorio', $data)
					|| !array_key_exists('area_idarea', $data)) {
						$state = false;
				}	
				break;
			//LABORATORIO_EQUIPAMENTO
			case "laboratorioequipamento":
				if (array_key_exists('laboratorio_idlaboratorio', $data)){
					if(empty($data['laboratorio_idlaboratorio']) || !is_numeric($data['laboratorio_idlaboratorio'])){
						$state = false;
					}
				}
				
				if (array_key_exists('equipamento_idequipamento', $data)) {
					if(empty($data['equipamento_idequipamento']) || !is_numeric($data['equipamento_idequipamento'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('laboratorio_idlaboratorio', $data)
					|| !array_key_exists('equipamento_idequipamento', $data)) {
						$state = false;
				}					
				break;
			//LABORATORIO_INDIVIDUO
			case "laboratorioindividuo":
				if (array_key_exists('laboratorio_idlaboratorio', $data)){
					if(empty($data['laboratorio_idlaboratorio']) || !is_numeric($data['laboratorio_idlaboratorio'])){
						$state = false;
					}
				}
				
				if (array_key_exists('individuo_idindividuo', $data)) {
					if(empty($data['individuo_idindividuo']) || !is_numeric($data['individuo_idindividuo'])){
						$state = false;
					}						
				}
				
				if (!array_key_exists('laboratorio_idlaboratorio', $data)
					|| !array_key_exists('individuo_idindividuo', $data)) {
						$state = false;
				}	
				break;
			//MEDIA
			case "media":
			echo "media";
				if (array_key_exists('laboratorio_idlaboratorio', $data)){
					if(empty($data['laboratorio_idlaboratorio']) || !is_numeric($data['laboratorio_idlaboratorio'])){
						   echo "empty or something lab = ".$data['laboratorio_idlaboratorio'];
						$state = false;
					}
				}
				
				if (array_key_exists('mediatipo_idmediatipo', $data)) {
					if(empty($data['mediatipo_idmediatipo']) || !is_numeric($data['mediatipo_idmediatipo'])){
						   echo "empty or something tipo";
						$state = false;
					}						
				}
				
				if (!array_key_exists('laboratorio_idlaboratorio', $data)
					|| !array_key_exists('mediatipo_idmediatipo', $data)) {
						echo "not exist";
						$state = false;
				}	
				break;
            case "distrito":
            case "instituicaotipo":
            case "individuo":
            case "equipamentotipo":
            case "mediatipo":
            $state = true;
            break;


			default:
				$state = false;
				break;
		}
		
		return $state;
	}
}
?>