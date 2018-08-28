<!--Script verifica se existe sessao caso nao haja reeindirecciona para fazlogin que apresenta mensagem que e necessario iniciar a sessao-->
<?php
// iniciar uma sess�o
session_start();

if (($_SESSION['admin'])==''){

    // n�o existe sess�o iniciada
    // neste caso, levamos o utilizador para a p�gina de login
    header('Location: index.php');
    exit();
}
?>