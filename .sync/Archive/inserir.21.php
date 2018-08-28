<?php
include ("classes/class_crud.php");

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
            "estado" => $_POST['estado']
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






    default:
        echo '<script>
			alert("form não existente");
		  </script>';
        break;


}

$result = $lab_crud->insert($_POST['form'],$data_ins);

if($result[0] == true){
    echo '<script>
			alert("Inserido com sucesso '.$result[1].'");
		  </script>';
}else{
    echo '<script>
			alert("Ocorreu um erro na inserção!");
		  </script>';
}


?>