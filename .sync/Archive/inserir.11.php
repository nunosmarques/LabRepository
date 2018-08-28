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

        $result = $lab_crud->insert("concelho",$data_ins);

        if($result[0] == true){
            echo '<script>
			alert("Inserido com sucesso '.$result[1].'");
		  </script>';
        }else{
            echo '<script>
			alert("Ocorreu um erro na inserção!");
		  </script>';
        }
        break;

    case "distrito":
        $data_ins = array(
            "distrito" => $_POST['distrito']
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