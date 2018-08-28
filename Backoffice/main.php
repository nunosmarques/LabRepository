<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include_once("../config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home - Backoffice</title>
<script type="text/javascript" src="../library/jquery.min.js"></script>
<link rel="stylesheet" href="../css/default.css" type="text/css" />
</head>

<body>
<header>
<h1>Backoffice</h1>
<nav>
	<ul>
    	<li><a class="ajax" name="home" href="main.php?s=home">Home</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=area">Áreas</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=concelho">Concelhos</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=distrito">Distritos</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=equipamento">Equipamentos</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=equipamentotipo">Tipos de Equipamentos</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=individuo">Individuos</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=instituicao">Instituições</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=instituicaotipo">Tipos de Instituições</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=laboratorio">Laboratórios</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=media">Média</a></li>
        <li><a class="ajax" href="main.php?s=listagem_tabelas&tbl=mediatipo">Tipos de Média</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>
</header>

<main>
	<article style="width:100% !important;">
    <?php 
        include "../ajax.php";
    ?>
    </article>
</main>

<footer>
Copyright DAAI2
</footer>

<script>
$( document ).ready(function(){
	//Navegar pelas páginas
    $(".ajax").on("click", function(){
		var page = $(this).attr("href");
		var title;
		if($(this).attr("name") != "home"){
			page = page.split('=')[2];
			$.get("inc_listagem_tabelas.php?tbl="+page, function(data){
				$("article").html( data );
			});
			title = page.toLowerCase().replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			});
		}else{
			page = $(this).attr("name");
			$.get("ajax.php?s="+page, function(data){
				$("article").html( data );
			});
			
			title = page.toLowerCase().replace(/\b[a-z]/g, function(letter) {
				return letter.toUpperCase();
			});
		}
		
		$(document).prop('title', title);
		window.history.pushState("", page, actual_url);
		
		event.preventDefault();
	});

	window.addEventListener("popstate", function(e) {
   	 window.location.href = location.href;
	});
});
</script>
</body>
</html>