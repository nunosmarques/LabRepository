<?php include ("classes/class_crud.php");

$lab_crud = new CRUD();

$tabela=$_GET['tbl'];
$id = $_GET['id'];

$data = array("id".$tabela => $_POST['id']);

//DELETE COM SELECT NO FINAL
$result = $lab_crud->delete("laboratorio", $data," = ", NULL);

if($result != false){
    echo '<script>
			alert("Apagado com sucesso.");
		  </script>';

}else{
    echo '<script>
			alert("Ocorreu um erro na eliminação!");
		  </script>';
}