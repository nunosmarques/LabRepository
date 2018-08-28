<?php

include ("classes/class_crud.php");

$lab_crud = new CRUD();

echo $lab_crud->select("laboratorio","=","idlaboratorio","'1'","5");





?>