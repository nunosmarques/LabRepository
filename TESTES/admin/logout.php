<!--Script logout destroi todas as sessoes iniciadas no servidor-->
<?php
// aceder �s sess�es
session_start();
 
// para terminar uma sess�o, apenas � necess�rio destru�-la
session_destroy();
 
// redirecionar o utilizador para pagina inicial
header('Location: index.php');
?>