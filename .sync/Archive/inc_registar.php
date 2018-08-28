<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	echo "session";
}

$tbl = "";

if(!empty($_SESSION['tbl'])){
	$tbl = $_SESSION['tbl'];
	echo "tbl";
}

switch($tbl){	
	case "laboratorio":
		echo '<form method="post"  action="inserir.php" class="xpto" id="0">
					<fieldset>
						<legend>Novo Laboratorio</legend>
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
						<input type="hidden" name="deleted" value="N">
						<input type="hidden" name="form" value="individuo">
						<br><button type="submit">Adicionar</button>
					</fieldset>
				</form>';
		break;
    case "registo":
      echo'<form method="post"  action="inserir.php" class="xpto" id="0">
				<fieldset>
					<legend>Novo Registo</legend>
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
					<label>Confirme a password:</label>
					<input type="text" name ="password2"><br>
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