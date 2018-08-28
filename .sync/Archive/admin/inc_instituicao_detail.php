<?php include ("classes/LabApp.php");

$config = new LabApp();
$id =  $_GET['id'];


$query = "
SELECT * FROM instituicao inst
          INNER JOIN instituicaotipo tip ON inst.instituicaotipo_idinstituicaotipo = tip.idinstituicaotipo
		  INNER JOIN concelho c ON inst.concelho_idconcelho = c.idconcelho
		  WHERE idinstituicao = ".$id." AND inst.deleted = 'N' LIMIT 0, 1";

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

<div class="instituicoes">

	<div >
    <?php
    echo        '<h2>Nome: '.$result[0]['instituicao'].'</h2>
                <h3>Tipo Instituição: '.$result[0]['instituicaotipo'].'</h3><br>


		        <h4>Morada: '.$result[0]['morada'].'</h4>
		        <h4>Codigo Postal: '.$result[0]['codigopostal'].'</h4>
		        <h4>Localidade: '.$result[0]['localidade'].'</h4>
		        <h4>Telefone: '.$result[0]['telefone'].'</h4>
		        <h4>WebSite: <a href="'.$result[0]['website'].'">'.$result[0]['website'].'</a></h4>
		        <h4>Fax: '.$result[0]['fax'].'</h4>
		        <h4>E-mail: <a href="'.$result[0]['email'].'">'.$result[0]['email'].'</a></h4>
		        <h4>Concelho: '.$result[0]['concelho'].'</h4>';
    include("listagem_lab_instituicao.php");
     ?>  
    </div>
</div>