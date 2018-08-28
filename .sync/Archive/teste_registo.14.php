<?php session_start();
include("./classes/class_crud.php");
include("./upload_script.php");
$lab_crud = new CRUD("");

$mail = "teste";
$password = "teste";
$passwordMD5 = md5($password);
$dados = "cona";
echo $passwordMD5;
$hashMail = md5($mail.$password);

$data = array("email" => $mail);

$result = $crud->select2("individuo", "=", $data, "AND", NULL);

if (sizeof($result) == 1){
    echo "Email já existe";
}else{

    $data_ins = array(

        "nome" => $dados,
        "morada" => $dados,
        "codigopostal" => $dados,
        "localidade" => $dados,
        "telemovel" => $dados,
        "telefone" => $dados,
        "fax" => $dados,
        "email" => $dados,
        "cv" => $dados,
        "twitter" => $dados,
        "fb" => $dados,
        "linkedin" => $dados,
        "email" => $mail,
        "password" => $passwordMD5,
        "aprovado" => $hashMail,

    );



    $result = $lab_crud->insert("individuo",$data_ins);

    if($result[0] == true) {
        echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';


        
        // header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);


    }

}




?>