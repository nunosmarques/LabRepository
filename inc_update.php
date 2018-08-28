<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){ header('location:index.php?s=home'); }
include("classes/class_crud.php");

$lab_crud = new CRUD("");

$return = array();

if(isset($_GET['tbl'])){
	$tabela = $_GET['tbl'];
	$tbl = $_GET['tbl'];
}

if(isset($_GET['id'])){
	$id =  $_GET['id'];
}else{
	$id = $_SESSION['user']['id'];
}

$data = array("id".$tabela => $id);
$return = $lab_crud->select($tabela," = ", $data, NULL, 5);

switch($tbl){
    case "laboratorio":
		include ("check_lab.php");
       echo '<form method="post" action="update_lab.php"  class="xpto" id="0" enctype="multipart/form-data">
				<fieldset>
					<legend>Laboratório </legend>
					<label>Laboratório:</label>
					<input type="text" name ="laboratorio" value="'.$return[0][1].'"><br>
					<label>Instituição:</label>'.
					$result =$lab_crud->combox("instituicao",$return[0][2])
					.'<br>
					<label>Morada:</label>
					<input type="text" name ="morada" value="'.$return[0][3].'"><br>
					<label>Codigo-Postal:</label>
					<input type="text" name ="codigopostal" value="'.$return[0][4].'"><br>
					<label>Localidade:</label>
					<input type="text" name ="localidade" value="'.$return[0][5].'"><br>
					<label>Telefone:</label>
					<input type="text" name ="telefone" value="'.$return[0][6].'"><br>
					<label>Telemovel:</label>
					<input type="text" name ="telemovel" value="'.$return[0][7].'"><br>
					<label>Facebook:</label>
					<input type="text" name ="fb" value="'.$return[0][8].'"><br>
					<label>Hórario:</label>
					<input type="text" name ="horario" value="'.$return[0][9].'"><br>
					<label>E-mail:</label>
					<input type="text" name ="email" value="'.$return[0][10].'"><br>
					<label>Website:</label>
					<input type="text" name ="website" value="'.$return[0][11].'"><br>
					<label>Fax:</label>
					<input type="text" name ="fax" value="'.$return[0][12].'"><br>
					<label>Concelho:</label>'.
					$result =$lab_crud->combox("concelho",$return[0][13])
					.'<br>
					<label>Apresentação:</label><br>
					<textarea id="textarea" name="apresentacao" rows="4" cols="50">'.$return[0][14].'</textarea><br>';
					if(!empty($return[0][15]) && $return[0][15] != NULL && file_exists("../imagens/lab/".$return[0][0]."/".$return[0][15])){
						echo '<label>Logo Atual:</label>
							<img src="../imagens/lab/'.$return[0][0].'/'.$return[0][15].'" width="20%" height="20%"/>';
					}
					echo '<label>Logo:</label>
					<input type="file" name="logo" id="logo" value="'.$return[0][15].'"><br>';
					
					if(!empty($return[0][16]) && $return[0][16] != NULL && file_exists("../imagens/lab/".$return[0][0]."/".$return[0][16])){
						echo '<label>Foto Atual:</label>
							  <img src="../imagens/lab/'.$return[0][0].'/'.$return[0][16].'" width="20%" height="20%"/>';
					}
					
					echo '<label>Foto:</label>
					<input type="file" name="foto" id="foto""><br>
					<input type="hidden" name="deleted" value="N">
					<input type="hidden" name="form" value="laboratorio">
					<input type="hidden" name="id" value="'.$return[0][0].'">
					<br><button type="submit">Alterar</button>
				</fieldset>
			</form>';
        break;
    case "individuo":
	  include ("check_i.php");
      echo'<form method="post"  action="update_i.php" class="xpto" id="0">
				<fieldset>
					<legend>Editar perfil de <span style="color:#db3340; font-weight: bold;">'.$return[0][1].'</span></legend>
					<label>Nome:</label>
					<input type="text" name ="nome" value="'.$return[0][1].'"><br>
					<label>Morada:</label>
					<input type="text" name ="morada" value="'.$return[0][2].'"><br>
					<label>Codigo-Postal:</label>
					<input type="text" name ="codigopostal" value="'.$return[0][3].'"><br>
					<label>Localidade:</label>
					<input type="text" name ="localidade" value="'.$return[0][4].'"><br>
					<label>Telemóvel:</label>
					<input type="text" name ="telemovel" value="'.$return[0][5].'"><br>
					<label>Telefone:</label>
					<input type="text" name ="telefone" value="'.$return[0][6].'"><br>
					<label>Fax:</label>
					<input type="text" name ="fax" value="'.$return[0][7].'"><br>
					<label>E-mail:</label>
					<input type="text" name ="email" value="'.$return[0][8].'"><br>
					<label>Cv:</label><br>
					<textarea name="cv" rows="4" cols="50">'.$return[0][9].'</textarea><br>
					<label>Twitter:</label>
					<input type="text" name ="twitter" value="'.$return[0][10].'"><br>
					<label>Facebook:</label>
					<input type="text" name ="fb" value="'.$return[0][11].'"><br>
					<label>LinkedIn:</label>
					<input type="text" name ="linkedin" value="'.$return[0][12].'"><br>
					<input type="hidden" name="deleted" value="N">
					<input type="hidden" name="form" value="individuo">
					<input type="hidden" name="id" value="'.$return[0][0].'">
					<br><button type="submit">Alterar</button>
				</fieldset>
			</form>';
        break;
    default:
        echo '<script>
			alert("Ocorreu um problema! Contacte-nos!");
		  </script>';
        break;
}
?>













