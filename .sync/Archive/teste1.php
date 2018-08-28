<?php session_start();
require "classes/class_crud.php";
$id = $_SESSION['user']['id'];
$idlab = 2;//vai ser o get

$crud = new CRUD("");


//verifica se o user pode modificar o laboratorio em questão
$data = array("individuo_idindividuo" => $id ,"laboratorio_idlaboratorio"=>$idlab, "edita" => 'S');

$result = $crud->select2("laboratorioindividuo", "=", $data, "AND", NULL);


if (sizeof($result) == 1){
echo "pode editar";
//form

}else {
echo "nao pode editar";
}

?>