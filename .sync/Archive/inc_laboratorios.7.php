<?php include ("classes/LabApp.php");

$config = new LabApp("");

$string = "";
$where_condition = " OR ";
$query = "";
$result = array();
$limite = "";

if(isset($_POST['limite']) && !empty($_POST['limite'])){
	$limite = "LIMIT 0, ".$_POST['limite'];
}


if(isset($_POST['data']) && !empty($_POST['data'])){
	
	$data = $_POST['data'];	
	foreach($data as $k){
			$string .= ' '.$k .' '.$where_condition;
	}

	if(sizeof($where_condition) > 0){
		if($where_condition == "AND"){
			$string = substr($string, 0, -4);
		}else{
			$string = substr($string, 0, -3);
		}
	}

$query .= "SELECT * FROM laboratorio lab
		  INNER JOIN concelho c ON lab.concelho_idconcelho = c.idconcelho
		  INNER JOIN distrito d ON c.distrito_iddistrito = d.iddistrito
		  INNER JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
		  INNER JOIN instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo
		  INNER JOIN laboratorioequipamento labe ON lab.idlaboratorio = labe.laboratorio_idlaboratorio
		  INNER JOIN equipamento e ON labe.equipamento_idequipamento = e.idequipamento
		  INNER JOIN equipamentotipo et ON e.equipamentotipo_idequipamentotipo = et.idequipamentotipo
		  WHERE ".$string." AND lab.aprovado = 'S' AND lab.deleted = 'N' ".$limite."";
		  
}else if(isset($_SESSION['lab']) || isset($_SESSION['local']) || isset($_SESSION['inst']) ||
		 isset($_SESSION['tequip']) || isset($_SESSION['equip'])){
	
	foreach ($_SESSION as $key => $value){
		if(!empty($value)){
			$string .= ' '.$value .' '.$where_condition;
		}
	}

	if(sizeof($where_condition) > 0){
		if($where_condition == "AND"){
			$string = substr($string, 0, -4);
		}else{
			$string = substr($string, 0, -3);
		}
	}

$query .= "SELECT * FROM laboratorio lab
		  INNER JOIN concelho c ON lab.concelho_idconcelho = c.idconcelho
		  INNER JOIN distrito d ON c.distrito_iddistrito = d.iddistrito
		  INNER JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
		  INNER JOIN instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo
		  WHERE ".$string." AND lab.aprovado = 'S' AND lab.deleted = 'N' 
		  GROUP BY lab.idlaboratorio ".$limite;
		  
}else{
	$query .= "SELECT * FROM laboratorio lab
			  INNER JOIN concelho c ON lab.concelho_idconcelho = c.idconcelho
			  INNER JOIN distrito d ON c.distrito_iddistrito = d.iddistrito
			  INNER JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
			  INNER JOIN instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo
			  WHERE lab.aprovado = 'S' AND lab.deleted = 'N' ".$limite."";
}

$sql = $config->conn->prepare($query);

try {			
	$sql->execute();
}catch(PDOException $ex){
	echo '<script> 
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}//$query;
	echo "<h3>Laboratórios</h3>";
	$count = $sql->rowCount();
	if($count > 0){	
		while($result = $sql->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="search_results">
				<div class="img">';
				if(!empty($result['logo']) && $result['logo'] != NULL && file_exists('imagens/lab/'.$result['logo'])){
					echo '<img src="imagens/lab/'.$result['logo'].'">';
				}else{
					echo '<img src="imagens/na.png">';
				}
				echo '</div>
				<div class="info">
					<p>
						<b>Laboratório:</b>
						<br />
						<a href="index.php?s=laboratorio_detail&id='.$result["idlaboratorio"].'" class="details" name="'.$result["laboratorio"].'">'.$result["laboratorio"].'</a>
					</p>
					<p>
						<b>Apresentação:</b>
						<br />
						'.$result["apresentacao"].'
					</p>
				</div>
			 </div>';
		}
	}else{
		echo '<div class="search_results"> <h4>Não foram encontrados resuldados!</h4> </div>';
	}
?>