<?php include ("classes/LabApp.php");

$config = new LabApp();

$id = $_GET['id'];

$query = "SELECT * FROM laboratorio lab
		  INNER JOIN concelho c ON lab.concelho_idconcelho = c.idconcelho
		  INNER JOIN distrito d ON c.distrito_iddistrito = d.iddistrito
		  INNER JOIN instituicao i ON lab.instituicao_idinstituicao = i.idinstituicao
		  INNER JOIN instituicaotipo it ON i.instituicaotipo_idinstituicaotipo = it.idinstituicaotipo
		  WHERE idlaboratorio = ".$id." AND lab.deleted = 'N' LIMIT 0, 1";

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

<div class="laboratorios">
<!--    <aside>
        <form action="index.php" >
            <input type="hidden" name="s" value="laboratorios" />
            <input type="text" name="texto" value="" />
            <input type="submit" value="pesquisar" />
            
        </form>
    </aside>-->
	<div >
    <?php
		echo '<h2>'.$result[0]['laboratorio'].'</h2>
        	  <h3>'.$result[0]['instituicao'].'</h3>
			  
			  <p><img src="imagens/'.$result[0]['logo'].'" width="300" height="300"></p>
			  
        	  <h4>Website: <a href="'.$result[0]['website'].'">'.$result[0]['website'].'</a></h4>
			  <h4>Faceboock: <a href="'.$result[0]['fb'].'">'.$result[0]['fb'].'</a></h4>
        
        	  <h4>Horario de Funcionamento: '.$result[0]['horario'].'</h4>
        	  <h4>Morada: '.$result[0]['morada'].' - '.$result[0]['codigopostal'].' - '.$result[0]['localidade'].$result[0]['concelho'].'</h4>
        	  <h4>Telefone: '.$result[0]['telefone'].'<br />Telemovel: '.$result[0]['telemovel'].'</h4>
        	  <h4>Email: <a href="mailto:'.$result[0]['email'].'">'.$result[0]['email'].'</a></h4>
        
			  
        	  <h4>Descrição:<br/>'.$result[0]['apresentacao'].'</h4>';
     ?>  
    </div>

</div>