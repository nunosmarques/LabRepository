<?php
include_once("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<script type="text/javascript" src="library/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/default.css" type="text/css" />
</head>

<body>
<header>
<h1>LabApp</h1><br/>
<h2>Directório de Laboratórios</h2>
<nav>
	<div class="content">
		<ul>
	    	<li><a class="ajax" href="index.php?s=home">Home</a></li>
	        <li><a class="ajax" href="index.php?s=laboratorios">Laboratórios</a></li>
	        <li><a class="ajax" href="index.php?s=individuos">Individuos</a></li>
	        <li><a class="ajax" href="index.php?s=instituicoes">Instituições</a></li>
	    </ul>
    </div>
</nav>
</header>
<main>
<div class="content">
	<article>
    <?php 
        include "ajax.php";
    ?>
    </article>
	<aside>
    	<select id="cb_search">
        	<option value="laboratorios">Laboratorio</option>
            <option value="instituicoes">Instituição</option>
            <option value="individuos">Individuo</option>
        </select>
        <aside class="search"> 
        	<script>$( document ).ready(function(){ begin(); });</script>     
        </aside>
    </aside>
    </div>
</main>

<footer>
Copyright DAAI2
</footer>

<script>
var combo_name= "laboratorios";
$( document ).ready(function(){
	
	//Navegar pelas páginas
    $(".ajax").on("click", function(){
		var page = $(this).attr("href");
		page = page.split('=')[1];
		
		$.get("ajax.php?s="+page, function(data){
			$("article").html( data );
		});
		event.preventDefault();
	});
	
	//Defina menu de pesquisa
    $("#cb_search").on("change", function(){
		var page = $(this).val();
		combo_name = page;
		$.get("inc_search.php?s="+page, function(data){
			$(".search").html( data );
		}).fail(function() {
		  alert( "Ocorreu um erro!" );
		});
		event.preventDefault();
	});

});

function begin(){
  var page = "laboratorios";
  //$("#cb_search").val(page);
  $.get("inc_search.php?s="+page, function(data){
	  $(".search").html( data );
  }).fail(function() {
	alert( "Ocorreu um erro!" );
  });
}
</script>
</body>
</html>