<?php include ("classes/LabApp.php");

$config = new LabApp("");


if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
	$id = $_SESSION['id'];
}else if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	echo '<script>
			alert("Identificação não fornecida!");
		  </script>';
}
$query = "SELECT * FROM individuo
		  WHERE idindividuo = ".$id." AND deleted = 'N' LIMIT 0, 1";

$sql = $config->conn->prepare($query);
$result = array();

try {			
	$sql->execute();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);	
}catch(PDOException $ex){
	echo '<script> 
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}
?>

<div class="individuo">

	<div >
    <?php
		echo '<h2>Nome: '.$result[0]['nome'].'</h2>



		        <h4>Morada: '.$result[0]['morada'].'</h4>
		        <h4>Codigo Postal: '.$result[0]['codigopostal'].'</h4>
		        <h4>Localidade: '.$result[0]['localidade'].'</h4>
		        <h4>Telemovel: '.$result[0]['telemovel'].'</h4>
		        <h4>Telefone: '.$result[0]['telefone'].'</h4>
		        <h4>Fax: '.$result[0]['fax'].'</h4>
		        <h4>E-mail: <a href="'.$result[0]['email'].'">'.$result[0]['email'].'</a></h4>
		        <h4>CV: <a href="'.$result[0]['cv'].'">'.$result[0]['cv'].'</a></h4>
		        <h4>Twitter: <a href="'.$result[0]['twitter'].'">'.$result[0]['twitter'].'</a></h4>
		        <h4>Facebook: <a href="'.$result[0]['fb'].'">'.$result[0]['fb'].'</a></h4>
		        <h4>Linked-In: <a href="'.$result[0]['linkedin'].'">'.$result[0]['linkedin'].'</a></h4>';
     ?>  
    </div>
</div>