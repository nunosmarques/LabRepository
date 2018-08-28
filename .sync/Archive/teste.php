<?php session_start();
require "classes/class_crud.php";
$id = $_SESSION['user']['id'];

$crud = new CRUD("");


$data = array("individuo_idindividuo" => $id , "edita" => 'S');

$result = $crud->select2("laboratorio inner join laboratorioindividuo on laboratorio_idlaboratorio = idlaboratorio ", "=", $data, "AND", NULL);


if (sizeof($result) > 0){

    foreach ($result as &$value) {
        echo 'ID: '.$value[0].' Laboratório: '.$value[1].'<br>';
    }


}else {

}

?>