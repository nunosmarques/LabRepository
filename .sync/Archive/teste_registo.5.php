<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/class_crud.php");
include("../upload_script.php");
$lab_crud = new CRUD("");


$password = "teste";
$passwordMD5 = 

        $data_ins = array(
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "aprovado" =>
        );



$result = $lab_crud->insert("individo",$data_ins);

if($result[0] == true) {
    echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';


        header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);


}

?>