<?php

include_once("config.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<header>
<h1>Titulo</h1>
<nav>
	<ul>
    	<li><a href="index.php?s=home">Home</a></li>
        <li><a href="index.php?s=laboratorios">Laboratórios</a></li>
    </ul>
</nav>
</header>
<aside>
	<form action="index.php" >
    	<input type="hidden" name="s" value="laboratorios" />
    	
    </form>
</aside>
<main>
<?php 

	include "ajax.php";


?>
</main>
<footer>

</footer>
</body>
</html>