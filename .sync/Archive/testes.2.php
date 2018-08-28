<?php

include ("classes/class_crud.php");

$lab_crud = new CRUD();

$data = array("idlaboratorio" => 1);
//SELECT
 $return = $lab_crud->select("laboratorio"," = ", $data, NULL, 5);

echo $return;




?>