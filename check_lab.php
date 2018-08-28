<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){ header('location:index.php?s=home'); }

$id_user = $_SESSION['user']['id'];
//verifica se o user pode modificar o laboratorio em questão
$data = array("individuo_idindividuo" => $id_user ,"laboratorio_idlaboratorio"=>$id, "edita" => 'S');

$result = $lab_crud->select2("laboratorioindividuo", "=", $data, "AND", NULL);


if (sizeof($result) != 1){
	echo '<script>
			alert("Não tem permissão para alterar este laboratório!");
			window.location.href = "index.php?s=home";
		  </script>';
}
?>

<script>
window.location.h
</script>