<?php 

	$s=$_GET["s"];	
	
	if (empty($s)) {
		$ficheiro = "inc_home";	
	} else {
		$ficheiro = "inc_$s";	
	}

		
	if (file_exists("$ficheiro.php")) {
		include "$ficheiro.php";	
	} else {
		
		
	}	


?>