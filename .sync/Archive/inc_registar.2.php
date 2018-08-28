<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	echo "session";
}
include ("classes/class_crud.php");
$lab_crud = new CRUD("");

$tbl = "";

if(!empty($_SESSION['tbl'])){
	$tbl = $_SESSION['tbl'];
	echo "tbl";
}

switch($tbl){	
	case "laboratorio":
		echo '<form method="post" action="inserir.php"  class="xpto" id="0"enctype="multipart/form-data">
					<fieldset>
						<legend>Laboratório </legend>
						<label>Laboratório:</label>
						<input type="text" name ="laboratorio"><br>
						<label>Instituição:</label>
						' .$result =$lab_crud->combox("instituicao",NULL).'<br>
						<label>Morada:</label>
						<input type="text" name ="morada"><br>
						<label>Codigo-Postal:</label>
						<input type="text" name ="codigopostal"><br>
						<label>Localidade:</label>
						<input type="text" name ="localidade"><br>
						<label>Telefone:</label>
						<input type="text" name ="telefone"><br>
						<label>Telemovel:</label>
						<input type="text" name ="telemovel"><br>
						<label>Facebook:</label>
						<input type="text" name ="fb"><br>
						<label>Hórario:</label>
						<input type="text" name ="horario"><br>
						<label>E-mail:</label>
						<input type="text" name ="email"><br>
						<label>Website:</label>
						<input type="text" name ="website"><br>
						<label>Fax:</label>
						<input type="text" name ="fax"><br>
						<label>Concelho:</label>
						'.$result =$lab_crud->combox("concelho",NULL).'<br>
						<label>Apresentação:</label><br>
						<textarea name="apresentacao" rows="4" cols="50"></textarea><br>
						<label>Logo:</label>
						<input type="file" name="logo" id="logo"><br>
						<label>Foto:</label>
						<input type="file" name="foto" id="foto"><br>
						<input type="hidden" name="deleted" value="N">
						<input type="hidden" name="form" value="laboratorio">
						<br><button type="submit">Adicionar</button>
					</fieldset>
				</form>';
		break;
    case "registo":
      echo'<form method="post"  action="registo.php" class="xpto" id="0">
				<fieldset>
					<legend>Individuo </legend>
					<label>Nome:</label>
					<input type="text" name ="nome"><br>
					<label>Morada:</label>
					<input type="text" name ="morada"><br>
					<label>Codigo-Postal:</label>
					<input type="text" name ="codigopostal"><br>
					<label>Localidade:</label>
					<input type="text" name ="localidade"><br>
					<label>Telemóvel:</label>
					<input type="text" name ="telemovel"><br>
					<label>Telefone:</label>
					<input type="text" name ="telefone"><br>
					<label>Fax:</label>
					<input type="text" name ="fax"><br>
					<label>E-mail:</label>
					<input type="text" name ="email"><br>
					<label>Cv:</label><br>
					<textarea name="cv" rows="4" cols="50"></textarea><br>
					<label>Twitter:</label>
					<input type="text" name ="twitter"><br>
					<label>Facebook:</label>
					<input type="text" name ="fb"><br>
					<label>LinkedIn:</label>
					<input type="text" name ="linkedin"><br>
					<label>Password:</label>
					<input type="text" name ="password"><br>
					<input type="hidden" name="form" value="individuo">
					<br><button type="submit">Adicionar</button>
				</fieldset>
			</form>';
        	break;
		default:
			echo "";
			break;
}
?>