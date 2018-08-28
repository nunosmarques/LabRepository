<!doctype html>

<head>

	<!-- Basics -->
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Login</title>

	<!-- CSS -->
	<style type="text/css">
  #header { position: relative; }
  #header-content { position: absolute; bottom: 100%; left: 0; }
  </style>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>

	<!-- Main HTML -->
	
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form action='inc/autenticacao.rotinas.php' method=post>
		
		<label for="name">Username:</label>
		
		<input type="name" name="usuario">
		
		<label for="username">Password:</label>

		
		<input name="senha"type="password">
		
		<div id="lower">
		<input type='hidden' name="enviado" value="posted">
		<input type="submit" value="Login">
		
		</div>
		
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
    <div id="header">
	<?php include("../bnice.php");?>
    </div>
</body>

</html>
	
	
	
