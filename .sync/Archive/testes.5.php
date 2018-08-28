<?php

include ("classes/class_crud.php");

$lab_crud = new CRUD();

$data = array("idlaboratorio" => 1);
//SELECT
 $return = $lab_crud->select("laboratorio"," = ", $data, NULL, 5);

$result = $return->fetchAll(PDO::FETCH_ASSOC);

echo $result[1];
echo $result[2];
echo $result[3];
echo $result[4];


?>