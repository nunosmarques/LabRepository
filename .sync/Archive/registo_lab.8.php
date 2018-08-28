<?php session_start();
include("./classes/class_crud.php");
include("./upload_script.php");
$lab_crud = new CRUD("");


        $data_ins = array(
            "laboratorio" => $_POST['laboratorio'],
            "instituicao_idinstituicao" =>$_POST['instituicao'],
            "morada" => $_POST['morada'],
            "codigopostal" => $_POST['codigopostal'],
            "localidade" => $_POST['localidade'],
            "telefone" => $_POST['telefone'],
            "telemovel" => $_POST['telemovel'],
            "fb" => $_POST['fb'],
            "horario" => $_POST['horario'],
            "email" => $_POST['email'],
            "website" => $_POST['website'],
            "fax" => $_POST['fax'],
            "concelho_idconcelho" => $_POST['concelho'],
            "apresentacao" => $_POST['apresentacao'],
            "logo" => $_FILES['logo']['name'],
            "foto" => $_FILES['foto']['name'],
            "aprovado" => 'N'
        );




$result = $lab_crud->insert($_POST['form'],$data_ins);

if($result[0] == true) {
    echo '<script>
			alert("Inserido com sucesso ' . $result[1] . '");
		  </script>';



    if ($result != false) {
        if (isset($_FILES['logo']) && file_exists($_FILES['logo']['tmp_name'])) {
            $entrada_form = "laboratorio";//nome do form
            $nomebox = "logo";//nome do campo(post imagebox name)
            upload_imagem2($entrada_form, $nomebox, $result[1]);
        }

        if (isset($_FILES['foto']) && file_exists($_FILES['foto']['tmp_name'])) {
            $entrada_form = "laboratorio";//nome do form
            $nomebox = "foto";//nome do campo(post imagebox name)
            upload_imagem2($entrada_form, $nomebox, $result[1]);
        }

        if (isset($_FILES['media']) && file_exists($_FILES['media']['tmp_name'])) {
            $entrada_form = "media";//nome do form
            $nomebox = "media";//nome do campo(post imagebox name)
            upload_imagem2($entrada_form, $nomebox, $result[1]);
        }
        header("Location:index.php?s=laboratorios");

    } else {
        echo '<script>
			alert("Ocorreu um erro na inserção!");
		  </script>';
    }

}

?>