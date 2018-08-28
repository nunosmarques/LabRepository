<?php session_start();
require "../classes/class_crud.php";

$crud = new CRUD("others");

$mail =$_POST['mail'];
$pass = md5($_POST['pass']);

$data = array("email" => $mail , "password" => $pass, "administrador" => "S", "aprovado" => "S", );

$result = $crud->select("individuo", "LIKE", $data, "AND", NULL);


if (sizeof($result) == 1){
	
		$_SESSION['admin'] = true;
		$_SESSION['user'] = $result[0][1];
		$_SESSION['success'] = true;
		
		header('Location:main.php');
		
}else {
	
	$_SESSION['success'] = false;
	sleep(2);
    header('Location:index.php');
	
}

?>