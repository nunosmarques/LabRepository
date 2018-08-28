<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "classes/class_crud.php";
$id = $_SESSION['user']['id'];

$crud = new CRUD("");

echo '<h4>My name  '.$_SESSION['user']['nome'].' </h4>';
echo '<a href="index.php?s=registar&tbl=laboratorio"><button class="button usr">Adicionar Laboratório</button></a>';
echo '<a href="index.php?s=registar&tbl=chpass"><button class="button usr">Alterar Password</button></a>';
echo '<a href="index.php?s=update&tbl=individuo"><button class="button usr">Editar Perfil</button></a>';
echo "<br/><br/><h3>Laboratórios a que estou associado:</h3>";
include ("labs_assoc_individuo.php");
?>