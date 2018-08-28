<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$_SESSION['lab'] = "lab.laboratorio LIKE ";
	$_SESSION['local'] = "i.localidade LIKE ";
	$_SESSION['inst'] = "i.instituicao LIKE ";
	foreach ($_SESSION as $key => $value){
		echo $key." - ".$value."<br />";
	}
	
?>
</body>
</html>