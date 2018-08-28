<?php
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
    	<li><a class="ajax" name="home" href="backoffice_index.php?s=home">Home</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=area">Áreas</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=concelho">Concelhos</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=distrito">Distritos</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=equipamento">Equipamentos</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=equipamentotipo">Tipos de Equipamentos</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=individuo">Individuos</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=instituicao">Instituições</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=instituicaotipo">Tipos de Instituições</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=laboratorio">Laboratórios</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=media">Média</a></li>
        <li><a class="ajax" href="backoffice_index.php?s=listagem_tabelas&tbl=mediatipo">Tipos de Média</a></li>
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
		
		if($(this).attr("name") != "home"){
			page = page.split('=')[2];
			$.get("inc_listagem_tabelas.php?tbl="+page, function(data){
				$("article").html( data );
			});
		}else{
			page = $(this).attr("name");
			$.get("ajax.php?s="+page, function(data){
				$("article").html( data );
			});
		}
		event.preventDefault();
	});
});
</script>
</body>
</html>