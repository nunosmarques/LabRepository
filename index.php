<?php session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<script type="text/javascript" src="library/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
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
            		echo '<li><a class="ajax" href="index.php?s=user"><span style="color:#7CD131;font-weight: bold;;">'.$_SESSION['user']['nome'].'</span></a></li>';
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
</body>
</html>