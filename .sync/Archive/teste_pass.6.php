<?php
session_start();
require "classes/class_crud.php";


$atual =  md5($_POST['atual']);
$nova1 =  md5($_POST['nova1']);
$nova2 =  md5($_POST['nova2']);


if($nova1 !=$nova2){
    echo "passwords novas n coincidem";
}else {

    $crud = new CRUD("");


    $data = array("idindividuo"=>$_SESSION['user']['id'],"password" => $atual);

    $result = $crud->select("individuo", "=", $data, "AND", NULL);


    if (sizeof($result) == 1) {

        $data_ins = array(
            "password" => $nova1
        );

        $data = array("idindividuo" => $_SESSION['user']['id']);
        $result = $crud->update("individuo", $data, " = ", "", $data_ins);


    }else{
        echo "Password atual errada!";
    }
}