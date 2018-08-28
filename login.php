<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "classes/class_crud.php";

$crud = new CRUD("");

$mail =$_POST['mail'];
$pass = md5($_POST['pass']);

$data = array("email" => $mail , "password" => $pass, "aprovado" => "S");

$result = $crud->select("individuo", "LIKE", $data, "AND", NULL);


if (sizeof($result) == 1){
$data = array("individuo_idindividuo" => $result[0][0] , "edita" => "S");	
$resultado = $crud->select("laboratorioindividuo", "LIKE", $data, "AND", NULL);
	
	if (sizeof($resultado) == 1){
		$_SESSION['editor'] = true;
		$_SESSION['user'] = array("id" => $result[0][0], "nome" => $result[0][1]);	
		$_SESSION['check'] = true;	
	}else{
		$_SESSION['editor'] = false;
		$_SESSION['user'] = array("id" => $result[0][0], "nome" => $result[0][1]);	
		$_SESSION['check'] = true;
	}
	unset($_SESSION['check']);
	$_SESSION['login'] = "done";
	header('Location:index.php?s=user');
}else {
	$_SESSION['check'] = false;
    echo '<script>
			alert("Login incorreto!");
			window.location.href = "index.php?s=login";
		 </script>';
}

?>