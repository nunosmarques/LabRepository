<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Teste Lab</title>
</head>

<body>
<?php
include ("classes/class_crud.php");

$lab_crud = new CRUD();

$data = array();

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
	);/*
$data_ins = array(
	"media" => "teste15.jpeg",
	"laboratorio_idlaboratorio" => 2,
	"mediatipo_idmediatipo" =>2);
		
$result = $lab_crud->insert("media",$data_ins);

if($result[0] == true){
	echo '<script>
			alert("Inserido com sucesso '.$result[1].'");
		  </script>';
		  $data = array("idlaboratorio" => $result[1]);
}else{
	echo '<script>
			alert("Ocorreu um erro na inserção!");
		  </script>';
}

//SELECT
$return = $lab_crud->select("laboratorio",NULL, NULL, NULL, 5);
//print_r($return);

foreach($return as $key){
	foreach($key as $value){
		echo $value."<br />";
	}
}

//DELETE COM SELECT NO FINAL
$result = $lab_crud->delete("laboratorio", $data," = ", NULL);

if($result != false){
	echo '<script>
			alert("Apagado com sucesso.");
		  </script>';
		  
	$return = $lab_crud->select("laboratorio"," = ",$data,NULL,5);
	print_r($return);
	
}else{
	echo '<script>
			alert("Ocorreu um erro na eliminação!");
		  </script>';
}

//UNDELETE -- RECUPERA INFORMAÇÃO -- COM SELECT NO FIM
$result = $lab_crud->undelete("laboratorio", $data," = ", NULL);

if($result != false){
	echo '<script>
			alert("Recuperado com sucesso.");
		  </script>';
		  
	$data_sel = array("idlaboratorio"=>1);
	$return = $lab_crud->select("laboratorio"," = ",$data,NULL,5);
	print_r($return);
	
}else{
	echo '<script>
			alert("Ocorreu um erro na recuperação!");
		  </script>';
}

//UPDATE COM SELECT NO FIM
$data_up = array("laboratorio" => "Lab ciencia", "morada"=>"rua xpto de xpto", "codigopostal"=>2140);

$result = $lab_crud->update("laboratorio", $data, " = ", "", $data_up);

if($result != false){
	echo '<script>
			alert("Modificado com sucesso.");
		  </script>';
		  
	$return = $lab_crud->select("laboratorio", " = ", $data, NULL, 5);
	print_r($return);
	
}else{
	echo '<script>
			alert("Ocorreu um erro ao proceder à alteração!");
		  </script>';
}*/

?>

</body>
</html>