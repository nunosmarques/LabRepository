<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){ header('location:index.php?s=home'); }

$iduser = $_SESSION['user']['id'];

//verifica se o user esta a editar o seu perfil
if ($id != $iduser){
	  echo '<script>
		  alert("Não tem permissão para efetuar alterações neste perfil!");
		  window.location.href = "index.php?s=home";
		</script>';
}

?>