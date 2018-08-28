<?php session_start();
require "classes/class_crud.php";
$id = $_SESSION['user']['id'];
$iduser = 3;//vai ser o get

$crud = new CRUD("");


//verifica se o user esta a editar o seu perfil
if ($id==$iduser){
    echo "pode editar";
//form
}else {
    echo "nao pode editar";
}

?>