<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/class_crud.php");

$lab_crud = new CRUD("others");

$tabela=$_GET['tbl'];
$id = $_GET['id'];

$data = array("id".$tabela => $id);


//DELETE COM SELECT NO FINAL
$result = $lab_crud->delete($tabela, $data," = ", NULL);

if($result != false){
    echo '<script>
			alert("Apagado com sucesso.");
		  </script>';

}else{
    echo '<script>
			alert("Ocorreu um erro na eliminação!");
		  </script>';
}

header("Location:main.php?s=listagem_tabelas&tbl=".$tabela);
?>