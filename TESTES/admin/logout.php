<!--Script logout destroi todas as sessoes iniciadas no servidor-->
<?php
// aceder às sessões
session_start();
 
// para terminar uma sessão, apenas é necessário destruí-la
session_destroy();
 
// redirecionar o utilizador para pagina inicial
header('Location: index.php');
?>