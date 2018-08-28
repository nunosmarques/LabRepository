<?php session_start();
include("./classes/class_crud.php");
include("./upload_script.php");
$crud = new CRUD("");

$mail = $_POST['email'];
$password = $_POST['password'] ;
$passwordMD5 = md5($password);
$hashMail = md5($mail.$password);

$data = array("email" => $mail);

$result = $crud->select2("individuo", "=", $data, "AND", NULL);

if (sizeof($result) == 1){
    echo "Email já existe";
}else{

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
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "aprovado" => $hashMail

    );


    $result = $crud->insert("individuo",$data_ins);

    if($result[0] == true) {
        echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';

        $corpo_mail = "check_register.php?hash=".$hashMail;
       $crud->sendMail("Informática","teste@hotmail.com",$mail,"Confirmação de Registo",$corpo_mail);
        header("Location:index.php?s=login");


    }

}




?>