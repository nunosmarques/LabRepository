<head>
	<title>Login</title>
</head>
	<!-- Main HTML -->
<body>
	
	<!-- Begin Page Content -->
	
	<div id="container">
		
		<form action='check_login.php' method=post>

                <label>Username:</label>
                <input type="name" name="user">
                <label>Password:</label>
                <input name="pass"type="password">
                <input type="submit" value="Login">
		</form>
		
	</div>
	
	
	<!-- End Page Content -->
    <div id="header">
	<?php include("../bnice.php");?>
    </div>
</body>

</html>
	
	
	
