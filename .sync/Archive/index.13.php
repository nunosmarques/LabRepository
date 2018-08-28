<?php

include_once("config.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<script type="text/javascript" src="library/jquery.min.js"></script>
<link rel="stylesheet" href="css/default.css" type="text/css" />
</head>

<body>
<header>
<h1>Titulo</h1>
<nav>
	<ul>
    	<li><a class="ajax" href="index.php?s=home">Home</a></li>
        <li><a class="ajax" href="index.php?s=laboratorio_detail">Laboratórios</a></li>
        <li><a class="ajaxP" href="#">Pesquisa Laboratórios</a></li>
        <li><a class="ajax" href="index.php?s=individuo_detail">Individuos</a></li>
        <li><a class="ajax" href="index.php?s=instituicao_detail">Instituições</a></li>
    </ul>
</nav>
</header>

<main>
	<article>
    <?php 
        include "ajax.php";
    ?>
    </article>
	<aside>
    	<select id="cb_search">
        	<option selected>Laboratorio</option>
            <option>Instituição</option>
            <option>Individuo</option>
        </select>
        <aside class="search"> 
        	<form method="post" class="x" id="1">
				<p>
					<label>Nome Laboratório: </label>
					<br />
					<input type="text" id="lab.laboratorio" placeholder="Laboratoiro da ESTA">
				</p>
				
				<p>
					<label>Localização: </label>
					<br />
					<input type="text" id="lab.localidade" placeholder="Abrantes">
				</p>
				
				<p>
					<label>Intituição: </label>
					<br />
					<input type="text" id="i.instituicao" placeholder="Camara Municipal">
				</p>
				
				<p>
					<label>Área Cientifica:</label>
					<br />
					<input type="text" id="labname" placeholder="Tecnologias de Informação">
				</p>
				
				<button type="submit" onClick="teste(); return false;">Pesquisar Laboratorio</button>
			</form>      
        </aside>
    </aside>
</main>

<footer>
Copyright DAAI2
</footer>

<script>
$( document ).ready(function(){
	
	//Navegar pelas páginas
    $(".ajax").on("click", function(){
		var page = $(this).attr("href");
		page = page.split('=')[1];
		
		$.get("ajax.php?s="+page, function(data){
			$("article").html( data );
		}).fail(function() {
		  alert( "Ocorreu um erro!" );
		});
		event.preventDefault();
	});
	
	//Efetuar a pesquisa
	$(".ajaxP").on("click", function(){
		var page = $(this).attr("href");
		var data = { };

		page = page.split('=')[1];
		
		$.post("inc_laboratorios.php",
		{
			"data"   : data,
			"limite" : 5
		},
		function(data, status){
			$("article").html( data );
		});
		event.preventDefault();
	});
	
	//Defina menu de pesquisa
    $("#cb_search").on("change", function(){
		var page = $(this).val();
		
		$.get("inc_search.php?s="+page, function(data){
			$(".search").html( data );
		}).fail(function() {
		  alert( "Ocorreu um erro!" );
		});
		event.preventDefault();
	});

});

function teste(){	
	var page = $(".x :input");
	var dados = new Array();
	var length = page.length - 1;
	
	for(var i = 0; i < length; i++){
		if($(page[i]).val().length > 0){
			dados.push($(page[i]).attr('id') + " LIKE '%" + page[i].value+"%'");
		}
	}

	$.post("inc_laboratorios.php",
	{
		"data"    : dados,
		"limite"  : 5
	},
	function(data, status){
		$("article").html( data );
	});

}
</script>
</body>
</html>