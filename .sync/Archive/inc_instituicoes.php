<?php include ("classes/LabApp.php");

$config = new LabApp();

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
	$query .= "SELECT * FROM labdir.instituicao i 
			   INNER JOIN labdir.concelho c ON i.concelho_idconcelho = c.idconcelho
			   INNER JOIN labdir.instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo
			   INNER JOIN labdir.laboratorio lab ON  i.idinstituicao = lab.instituicao_idinstituicao
			   WHERE ".$string." AND i.deleted = 'N' 
			   GROUP BY idinstituicao ".$limite;
}else{
	$query .= "SELECT * FROM instituicao WHERE deleted = 'N' ";
}
$sql = $config->conn->prepare($query);

try {			
	$sql->execute();
}catch(PDOException $ex){
	echo '<script> 
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}//$query;
	echo "<h3>Instituições</h3>";
	$count = $sql->rowCount();
	if($count > 0){
		while($result = $sql->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="search_results">
				<div class="img">
				<img src="imagens/na.png">
				</div>
				<div class="info">
					<p>'.$result["instituicao"].'</p>
				</div>
			 </div>';
		}
	}else{
		echo '<div class="search_results"> <h4>Não foram encontrados resuldados!</h4> </div>';
	}
?>