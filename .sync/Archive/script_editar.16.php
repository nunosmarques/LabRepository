<?php
include ("classes/class_crud.php");
include ("upload_script.php");

$lab_crud = new CRUD();
$data_ins = array();
switch($_POST['form']){

    case "concelho":
        $data_ins = array(
            "concelho" => $_POST['concelho'],
            "distrito_iddistrito" => $_POST['distrito']
        );
        break;

    case "distrito":
        $data_ins = array(
            "distrito" => $_POST['distrito']
        );
        break;

    case "instituicao":
        $data_ins = array(
            "instituicao" => $_POST['instituicao'],
            "instituicaotipo_idinstituicaotipo" => $_POST['instituicaotipo'],
            "morada" => $_POST['morada'],
            "codigopostal" => $_POST['codigopostal'],
            "localidade" => $_POST['localidade'],
            "telefone" => $_POST['telefone'],
            "website" => $_POST['website'],
            "fax" => $_POST['fax'],
            "email" => $_POST['email'],
            "concelho_idconcelho" => $_POST['concelho'],
            "deleted" => $_POST['deleted']
        );
        break;

    case "instituicaotipo":
        $data_ins = array(
            "instituicaotipo" => $_POST['instituicaotipo'],
            "deleted" => $_POST['deleted']
        );
        break;

    case "laboratorio":
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
            "logo" => $_POST['logo'],
            "foto" => $_POST['foto'],
            "deleted" => $_POST['deleted']
        );
        break;

    case "laboratorioarea":
        $data_ins = array(
            "laboratorioa_idlaboratorio" => $_POST['laboratorio'],
            "area_idarea" => $_POST['area'],
            "ordem" => $_POST['ordem']
        );
        break;

    case "area":
        $data_ins = array(
            "area" => $_POST['area'],
        );
        break;

    case "individuoarea":
        $data_ins = array(
            "individuo_idindividuo" => $_POST['individuo'],
            "area_idarea" => $_POST['area'],
            "ordem" => $_POST['ordem']
        );
        break;

    case "individuo":
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
        break;

    case "laboratorioindividuo":
        $data_ins = array(
            "individuo_idindividuo" => $_POST['individuo'],
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "coordenador" => $_POST['coordenador'],
            "edita" => $_POST['edita'],
        );
        break;

    case "laboratorioequipamento":
        $data_ins = array(
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "equipamento_idequipamento" => $_POST['equipamento']
        );
        break;

    case "equipamento":
        $data_ins = array(
            "equipamento" => $_POST['equipamento'],
            "equipamentotipo_idequipamentotipo" => $_POST['equipamentotipo']
        );
        break;

    case "equipamentotipo":
        $data_ins = array(
            "equipamentotipo" => $_POST['equipamentotipo'],
            "deleted" => $_POST['deleted']
        );
        break;

    case "mediatipo":
        $data_ins = array(
            "mediatipo" => $_POST['mediatipo']
        );
        break;

    case "media":
        $data_ins = array(
            "media" => $_POST['media'],
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "mediatipo_idmediatipo" => $_POST['media'],
            "deleted" => $_POST['deleted']
        );
        break;


    default:
        echo '<script>
			alert("form não existente");
		  </script>';
        break;


}

$data = array("id".$_POST['form'] => $_POST['id']);
$result = $lab_crud->update($_POST['form'], $data, " = ", "", $data_ins);

if($result != false) {
    echo '<script>
			alert("Modificado com sucesso.");
		  </script>';
    if ($_POST['form'] == "laboratorio") {
        $entrada_form = "laboratorio";//nome do form
        $nomebox="logo";//nome do campo(post imagebox name)
        if (isset($_POST['logo'])) {

            switch ($entrada_form) {
                case "media":
                    $pasta = "media/";
                    break;

                case "laboratorio":
                    $pasta = "lab/";
                    break;

            }


            $cenas = basename($_FILES["logo"]["name"]);
            if ($entrada_form == "laboratorio") {
                $target_dirx = "imagens/" . $pasta;
            } else {
                $target_dirx = "imagens/" . $pasta . "imagens/";

            }

            $target_file = $target_dirx;
            $target_file .= $cenas;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            echo $target_file . "<br>";

            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["$nomebox"]["tmp_name"]);//nome imgbox do form
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["$nomebox"]["size"] > 5000000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $target_file = $target_dirx . "/videos/" . $cenas;

            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["$nomebox"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["$nomebox"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            }//segunda
            if (isset($_POST['foto'])) {

            }
        }

    } else {
        echo '<script>
			alert("Ocorreu um erro ao proceder à alteração!");
		  </script>';
    }


?>