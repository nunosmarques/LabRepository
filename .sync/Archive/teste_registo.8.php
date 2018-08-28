<?php session_start();
include("../classes/class_crud.php");
include("../upload_script.php");
$lab_crud = new CRUD("");

$mail = "teste";
$password = "teste";
$passwordMD5 = md5($password);
echo $passwordMD5;
$hashMail = md5($mail.$password);

        $data_ins = array(
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "aprovado" => $hashMail
        );



$result = $lab_crud->insert("individo",$data_ins);

if($result[0] == true) {
    echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';


       // header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);


}

?>