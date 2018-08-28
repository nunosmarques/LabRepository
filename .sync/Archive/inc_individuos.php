<?php include ("classes/LabApp.php");

$config = new LabApp("");

$string = "";
$where_condition = " AND ";
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
		if($where_condition == " AND "){
			$string = substr($string, 0, -4);
		}else{
			$string = substr($string, 0, -3);
		}
	}

	$query .= "SELECT * FROM laboratorioindividuo labid
			   INNER JOIN individuo id ON  labid.individuo_idindividuo = id.idindividuo
			   INNER JOIN laboratorio lab ON labid.laboratorio_idlaboratorio = lab.idlaboratorio
			   LEFT JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
			   WHERE ".$string." AND id.deleted = 'N' GROUP BY labid.individuo_idindividuo ".$limite;
			   
}else if(isset($_SESSION['lab']) || isset($_SESSION['local']) || isset($_SESSION['inst']) ||
		 isset($_SESSION['nome']) || isset($_SESSION['mail'])){
			 
	foreach ($_SESSION as $key => $value){
		if(!empty($value)){
			$string .= ' '.$value .' '.$where_condition;
		}
	}
	
	if(sizeof($where_condition) > 0){
		if($where_condition == " AND "){
			$string = substr($string, 0, -4);
		}else{
			$string = substr($string, 0, -3);
		}
	}
	
	$query .= "SELECT * FROM laboratorioindividuo labid
			   INNER JOIN individuo id ON  labid.individuo_idindividuo = id.idindividuo
			   INNER JOIN laboratorio lab ON labid.laboratorio_idlaboratorio = lab.idlaboratorio
			   LEFT JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
			   WHERE ".$string." AND id.deleted = 'N' GROUP BY labid.individuo_idindividuo ".$limite;
		
}else{
	$query .= "SELECT * FROM laboratorioindividuo labid
			   INNER JOIN individuo id ON  labid.individuo_idindividuo = id.idindividuo
			   WHERE id.deleted = 'N'
			   GROUP BY labid.individuo_idindividuo";
}
$sql = $config->conn->prepare($query);

try {			
	$sql->execute();
}catch(PDOException $ex){
	echo '<script> 
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}//$query;
	echo "<h3>Individuos</h3>";
	$count = $sql->rowCount();
	if($count > 0){
		while($result = $sql->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="search_results">
				<div class="info">
					<p><a href="index.php?s=individuo_detail&id='.$result["idindividuo"].'" class="details" name="'.$result["idindividuo"].'">'.$result["nome"].'</a></p>
				</div>
			 </div>';
		}
	}else{
		echo '<div class="search_results"> <h4>Não foram encontrados resuldados!</h4> </div>';
	}
?>

<script>
$(".details").on("click", function(){
	var value = $(this).attr("name");
		
	$.get("inc_individuo_detail.php?id="+value, function(data){
		$("article").html( data );
	});
	event.preventDefault();
});
</script>