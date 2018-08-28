<?php
	include_once("config.php");
	if(isset($_GET['id'])){
		$_SESSION['id'] = $_GET["id"];
	}
	
	if(isset($_POST['pesquisa'])){
		switch($_POST['pesquisa']){
			case "laboratorios":
				if(isset($_POST['tequip']) && !empty($_POST['tequip'])){
					$_SESSION['tequip'] = "et.equipamentotipo LIKE '%".$_POST['tequip']."%'";
				}
				
				if(isset($_POST['equip']) && !empty($_POST['equip'])){
					$_SESSION['equip'] = "e.equipamento LIKE '%".$_POST['equip']."%'";
				}
				break;
			case "instituicoes":
				if(isset($_POST['morada']) && !empty($_POST['morada'])){
					$_SESSION['morada'] = "i.morada LIKE '%".$_POST['morada']."%'";
				}
				if(isset($_POST['cp']) && !empty($_POST['cp'])){
					$_SESSION['cp'] = "i.codigopostal LIKE ".$_POST['cp']."";
				}
				break;
			case "individuos":
				if(isset($_POST['nome']) && !empty($_POST['nome'])){
					$_SESSION['nome'] = "id.nome LIKE '%".$_POST['nome']."%'";
				}
				if(isset($_POST['mail']) && !empty($_POST['mail'])){
					$_SESSION['mail'] = "id.email LIKE '%".$_POST['mail']."%'";
				}
				break;
		}
		if(isset($_POST['lab']) && !empty($_POST['lab'])){
			$_SESSION['lab'] = "lab.laboratorio LIKE '%".$_POST['lab']."%'";
		}
		
		if(isset($_POST['local']) && !empty($_POST['local'])){
			$_SESSION['local'] = "i.localidade LIKE '%".$_POST['local']."%'";
		}
		
		if(isset($_POST['inst']) && !empty($_POST['inst'])){
			$_SESSION['inst'] = "i.instituicao LIKE '%".$_POST['inst']."%'";
		}
	}
	
	if(isset($_GET['idEdit'])){
		$_SESSION['idEdit'] = $_GET['idEdit'];
	}
	
	if(isset($_GET['tbl'])){
		$_SESSION['tbl'] = $_GET['tbl'];
	}
	
	if (!isset($_GET["s"])) {
		$ficheiro = "inc_home";	
	} else {
		$ficheiro = "inc_".$_GET["s"];	
	}
	
	if (file_exists("$ficheiro.php")) {
		include "$ficheiro.php";	
	}	
?>