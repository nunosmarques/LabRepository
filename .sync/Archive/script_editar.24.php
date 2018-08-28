<?php
include ("classes/class_crud.php");
include("upload_script.php");

$lab_crud = new CRUD();


/*$data = array();

//INSERT
$data_ins = array(
	"laboratorio" => "Lab de Teste",
	"instituicao_idinstituicao" => 1,
	"morada" => "Rua de Abrantes",
	"codigopostal" => 2200,
	"localidade" => "Abrantes",
	"telefone" => "241 790 654",
	"telemovel" => "917 123 456",
	"fb" => "fb/labteste",
	"horario" => "9:30h às 18h",
	"email" => "teste@labteste.pt",
	"website" => "www.labteste.pt",
	"fax" => "241 895 357",
	"concelho_idconcelho" => 3,
	"apresentacao" => "lab em abrantes ....",
	"logo" => "none",
	"foto" => "none",
	"deleted" => "N" ,
	);*/

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
        if(isset($_FILES['logo'])&& file_exists($_FILES['logo']['tmp_name'])&&isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])){
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

if($result != false){
    echo '<script>
			alert("Modificado com sucesso.");
		  </script>';
if(isset($_FILES['logo'])&& file_exists($_FILES['logo']['tmp_name'])) {
    echo "cenas";
    $entrada_form = "laboratorio";//nome do form
    $nomebox = "logo";//nome do campo(post imagebox name)
    upload_imagem($entrada_form, $nomebox);
}

    if(isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])) {
        echo "cenas2";
        $entrada_form = "laboratorio";//nome do form
        $nomebox = "foto";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox);
    }





}else{
    echo '<script>
			alert("Ocorreu um erro ao proceder à alteração!");
		  </script>';
}


?>