<?php session_start();
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
		<div style="float:left;">
	    	<li><a class="ajax" href="index.php?s=home">Home</a></li>
	        <li><a class="ajax" href="index.php?s=laboratorios">Laboratórios</a></li>
	        <li><a class="ajax" href="index.php?s=individuos">Individuos</a></li>
	        <li><a class="ajax" href="index.php?s=instituicoes">Instituições</a></li>     
	        </div>
	    <div style="float:right;">
            
            <?php
				if(isset($_SESSION['login']) && $_SESSION['login'] == "done"){
            		echo '<li><a class="ajax" href="index.php?s=user"><span style="color:#db3340;font-weight: bold;;">'.$_SESSION['user']['nome'].'</span></a></li>';
					echo '<li><a class="ajax" href="logout.php">Logout</a></li></div>';
				}else{
            		echo '<li><a class="ajax" href="index.php?s=login">Login</a></li>';
					echo '<li><a class="reg" href="index.php?s=registar&tbl=registo">Registar</a></li></div>';
				}
	    	?>
		</div>
        </ul>
    
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
        <aside class="search form"> 
        	<script>$( document ).ready(function(){ begin(); });</script>     
        </aside>
    </aside>
    </div>
</main>

<footer>
<div class="content">
<p>Copyright © <?php echo date("Y");?>  LabApp - Todos os direitos reservados</p>
<p>Ficha Técnica | Termos e Condições</p>
</div>
</footer>

<script>
var combo_name= "laboratorios";
$( document ).ready(function(){
	
	//Navegar pelas páginas
    $(".ajax").on("click", function(){
		var page = $(this).attr("href");
		var debug = page.split('?')[1];
		var tmp = debug.split('=')[2];
		
		var actual_url = page;
		page = page.split('=')[1];

		$.get("ajax.php?"+debug, function(data){
			$("article").html( data );
			
			if(page != "home" && page != "login" && tmp != "registar"){
				$.get("inc_search.php?s="+page, function(data){
					
						$("#cb_search").val(page);
					
					$(".search").html( data );
				}).fail(function() {
				  alert( "Ocorreu um erro!" );
				});
			}
		});
		
		//Muda o Title da página e capitaliza a primeira letra
		var title = page.toLowerCase().replace(/\b[a-z]/g, function(letter) {
			return letter.toUpperCase();
		});
		
		$(document).prop('title', title);
		window.history.pushState("", page, actual_url);
		event.preventDefault();
	});
	
	//Ir para a página de registo
    $(".reg").on("click", function(){
		var page = $(this).attr("href");
		var actual_url = page;
		$.get("inc_registar.php?tbl=registo", function(data){
			$("article").html( data );
		});
		//Muda o Title da página e capitaliza a primeira letra
		
		$(document).prop('title', "Novo Registo");
		window.history.pushState("", "Novo Registo", actual_url);
		event.preventDefault();
	});
	
	//Permite retroceder para a página anterior
	window.addEventListener("popstate", function(e) {
   	 window.location.href = location.href;
	});
	
	//Define menu de pesquisa
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
  $.get("inc_search.php?s="+page, function(data){
	  $(".search").html( data );
  }).fail(function() {
	alert( "Ocorreu um erro!" );
  });
}
</script>

</body>
</html>