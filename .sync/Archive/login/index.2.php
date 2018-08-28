<head>
	<title>Login</title>
</head>
	<!-- Main HTML -->
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form action='check_login.php' method=post>
		
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
	
	
	
