<?php session_start();
require "../classes/class_crud.php";
$crud = new CRUD("");

$hash = $_GET['hash'];

$data = array("aprovado" => $hash);

$result = $crud->select2("individuo", "=", $data, "AND", NULL);

if (sizeof($result) == 1){

    $data_ins = array(
        "aprovado" => "S"
    );
    $data = array("aprovado" => $hash);
    $result = $crud->update("individuo", $data, " = ", "", $data_ins);
    echo "O seu e-mail foi confirmado com sucesso!";

}else{
    echo "Código confirmação errado ou o seu mail já foi confirmado!";
}