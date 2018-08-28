<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/class_crud.php");
include("../upload_script.php");
$lab_crud = new CRUD("");




        $data_ins = array(
            "nome" => $_POST['nome'],
            "morada" => $_POST['morada'],
            "codigopostal" => $_POST['codigopostal'],
            "localidade" => $_POST['localidade'],
            "telemovel" => $_POST['telemovel'],
            "telefone" => $_POST['telefone'],
            "fax" => $_POST['fax'],
            "email" => $_POST['email'],
            "cv" => $_POST['cv'],
            "twitter" => $_POST['twitter'],
            "fb" => $_POST['fb'],
            "linkedin" => $_POST['linkedin'],
            "password" => $_POST['password'],
            "deleted" => $_POST['deleted']
        );



$result = $lab_crud->insert($_POST['form'],$data_ins);

if($result[0] == true) {
    echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';


        header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);


}

?>