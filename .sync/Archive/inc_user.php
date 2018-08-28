<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "classes/class_crud.php";
$id = $_SESSION['user']['id'];

$crud = new CRUD("");

echo '<h4>My name  '.$_SESSION['user']['nome'].' </h4>';
echo '<a href="index.php?s=registar&tbl=laboratorio">Adicionar Laboratório</a><br />';
echo '<a href="index.php?s=registar&tbl=chpass">Alterar Password</a><br />';
echo '<a href="index.php?s=update&tbl=individuo">Editar Perfil</a>';
echo "<h3>Laboratórios a que estou associado:</h3>";
include ("labs_assoc_individuo.php");
?>