<?php include ("classes/LabApp.php");

$config = new LabApp("");

$id = $_GET['id'];

$query = "SELECT * FROM labdir.laboratorio lab 
		  INNER JOIN labdir.concelho c ON lab.concelho_idconcelho = c.idconcelho 
		  INNER JOIN labdir.distrito d ON c.distrito_iddistrito = d.iddistrito 
		  INNER JOIN labdir.instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao 
		  INNER JOIN labdir.instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo  
		  WHERE labdir.lab.idlaboratorio = ".$id." AND labdir.lab.deleted = 'N'";

$sql = $config->conn->prepare($query);
$result = array();

try {			
	$sql->execute();
	$result = $sql->fetchAll(PDO::FETCH_ASSOC);	
}catch(PDOException $ex){
	/*echo '<script> 
			alert("Ocorreu um erro xpto: \\n'.$ex->getMessage().'");
		  </script>';*/
}
?>

<div class="laboratorios">
	<div >
    <?php
		echo '<h2>'.$result[0]['laboratorio'].'</h2>
        	  <h3>'.$result[0]['instituicao'].'</h3>';
			  
	   if(!empty($result[0]['logo']) && $result[0]['logo'] != NULL && file_exists('imagens/lab/'.$result[0]['logo'])){
			  echo '<p><img src="imagens/lab/'.$result[0]['logo'].'" width="20%"></p>';
		}else{
			echo '<p><img src="imagens/na.png" width="20%"></p>';
		}
			  
        echo '<h4>Website: <a href="'.$result[0]['website'].'">'.$result[0]['website'].'</a></h4>
			  <h4>Faceboock: <a href="'.$result[0]['fb'].'">'.$result[0]['fb'].'</a></h4>
        
        	  <h4>Horario de Funcionamento: '.$result[0]['horario'].'</h4>
        	  <h4>Morada: '.$result[0]['morada'].' - '.$result[0]['codigopostal'].' - '.$result[0]['localidade'].$result[0]['concelho'].'</h4>
        	  <h4>Telefone: '.$result[0]['telefone'].'<br />Telemovel: '.$result[0]['telemovel'].'</h4>
        	  <h4>Email: <a href="mailto:'.$result[0]['email'].'">'.$result[0]['email'].'</a></h4>
        
			  
        	  <h4>Descrição:<br/>'.$result[0]['apresentacao'].'</h4>';

    include("listagem_individos_lab.php");
    ?>
    </div>
</div>

		  