<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/class_crud.php");
include("../upload_script.php");

$lab_crud = new CRUD("");

switch($_POST['form']){

    case "laboratorio":
        if(isset($_FILES['logo'])&& file_exists($_FILES['logo']['tmp_name'])&&isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])){
            echo "2";
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
                "logo" => $_FILES['logo']["name"],
                "foto" => $_FILES['foto']["name"],
                "deleted" => $_POST['deleted']
            );
        }elseif(isset($_FILES['logo'])&& file_exists($_FILES['logo']['tmp_name'])){

            echo "logo";
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
                "logo" => $_FILES['logo']["name"],
                "deleted" => $_POST['deleted']
            );
        }elseif(isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])){
            echo "foto";
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
                "foto" => $_FILES['foto']["name"],
                "deleted" => $_POST['deleted']
            );

        }else{
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
                "deleted" => $_POST['deleted']
            );

        }

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

    default:
        echo '<script>
			alert("form não existente");
		  </script>';
        break;

}


$id = $_POST['id'];
$data = array("id".$_POST['form'] => $id);
$result = $lab_crud->update($_POST['form'], $data, " = ", "", $data_ins);

if($result != false){
    echo '<script>
			alert("Modificado com sucesso.");
		  </script>';

    if(isset($_FILES['logo']) && file_exists($_FILES['logo']['tmp_name'])) {
        $entrada_form = "laboratorio";//nome do form
        $nomebox = "logo";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    if(isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])) {
        $entrada_form = "laboratorio";//nome do form
        $nomebox = "foto";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    if(isset($_FILES['media'])&& file_exists($_FILES['media']['tmp_name'])) {
        $entrada_form = "media";//nome do form
        $nomebox = "media";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);

}else{
    echo '<script>
			alert("Ocorreu um erro na alteração!");
		  </script>';
}


?>