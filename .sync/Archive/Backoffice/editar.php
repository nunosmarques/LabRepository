<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/class_crud.php");

$lab_crud = new CRUD("others");

$return = array();
$tabela = $_GET['tbl'];
$tbl = $_GET['tbl'];

$id =  $_GET['id'];


$data = array("id".$tabela => $id);
if($tabela != "newlab"){
	$return = $lab_crud->select($tabela," = ", $data, NULL, 5);
}

switch($tbl){

    case "concelho":
       echo '
    <form method="post" action="script_editar.php" class="xpto" id="0">
    <fieldset>
        <legend>Concelho:</legend>
        <label>Concelho:  </label>
        <input type="text" name ="concelho" value="'.$return[0][1].'">
        <br><label>Distrito:</label>'.
        $result =$lab_crud->combox("distrito",$return[0][2]).'
        <input type="hidden" name="form" value="concelho">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>';
        break;

    case "distrito":
       echo '<form method="post"  action="script_editar.php" class="xpto">
    <fieldset>
        <legend>Distrito:</legend>
        <label>Distrito:  </label>
        <input type="text" name="distrito" value="'.$return[0][1].'">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <input type="hidden" name="form" value="distrito">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>';
        break;

    case "instituicao":
echo '<form method="post" action="script_editar.php"  class="xpto" id="0">
    <fieldset>
        <legend>Instituição </legend>
        <label>Instituição:</label>
        <input type="text" name ="instituicao" value="'.$return[0][1].'"><br>
        <label>Instituição Tipo:</label>'.
        $result =$lab_crud->combox("instituicaotipo",$return[0][2]).
        '<br>
        <label>Morada:</label>
        <input type="text" name ="morada" value="'.$return[0][3].'"><br>
        <label>Codigo-Postal:</label>
        <input type="text" name ="codigopostal" value="'.$return[0][4].'"><br>
        <label>Localidade:</label>
        <input type="text" name ="localidade" value="'.$return[0][5].'"><br>
        <label>Telefone:</label>
        <input type="text" name ="telefone" value="'.$return[0][6].'"><br>
        <label>Website:</label>
        <input type="text" name ="website" value="'.$return[0][7].'"><br>
        <label>Fax:</label>
        <input type="text" name ="fax" value="'.$return[0][8].'"><br>
        <label>E-mail:</label>
        <input type="text" name ="email" value="'.$return[0][9].'"><br>
        <label>Concelho:</label>'.
        $result =$lab_crud->combox("concelho",$return[0][10]).
        '<input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="instituicao">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
        </fieldset>
        </form>';
        break;

    case "instituicaotipo":
       echo '
<form method="post"  action="script_editar.php" class="xpto" id="0">
    <fieldset>
        <legend>Intituição Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="instituicaotipo" value="'.$return[0][1].'">
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="instituicaotipo">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
';
        break;

    case "laboratorio":
       echo '
<form method="post" action="script_editar.php"  class="xpto" id="0" enctype="multipart/form-data">
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
</form>

       ';
        break;


    case "area":
       echo'
           <form method="post" action="script_editar.php"  class="xpto" id="0">
    <fieldset>
        <legend>Area </legend>
        <label>Area:</label>
        <input type="text" name ="area"  value="'.$return[0][1].'">
        <input type="hidden" name="form" value="area">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
       ';
        break;

    case "individuo":
      echo'
      <form method="post"  action="script_editar.php" class="xpto" id="0">
    <fieldset>
        <legend>Individuo </legend>
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
        <label>Password:</label>
        <input type="text" name ="password" value="'.$return[0][13].'"><br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="individuo">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
      ';
        break;


    case "equipamento":
       echo '
       <form method="post" action="script_editar.php"  class="xpto" id="0">
    <fieldset>
        <legend>Equipamento </legend>
        <label>Equipamento:</label>
        <input type="text" name ="equipamento" value="'.$return[0][1].'"><br>
        <label>Tipo Equipamento:</label>'.
        $result =$lab_crud->combox("equipamentotipo",$return[0][2])
        .'<br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="equipamento">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
       ';
        break;

    case "equipamentotipo":
        echo '
        <form method="post"  action="script_editar.php" class="xpto" id="0">
    <fieldset>
        <legend>Equipamento Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="equipamentotipo" value="'.$return[0][1].'">
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="equipamentotipo">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>

        ';
        break;

    case "mediatipo":
      echo '
      <form method="post"  action="script_editar.php" class="xpto" id="0">
    <fieldset>
        <legend>Media Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="mediatipo" value="'.$return[0][1].'">
        <input type="hidden" name="form" value="mediatipo">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
      ';
        break;

    case "media":
       echo '
       <form method="post"  action="script_editar.php" class="xpto" id="0" enctype="multipart/form-data">
    <fieldset>
        <legend>Media </legend>';
		if(!empty($return[0][1]) && $return[0][1] != NULL && file_exists("../imagens/media/".$return[0][0]."/".$return[0][1])){
			echo '<label>Media Atual:</label>
				  <img src="../imagens/media/'.$return[0][1].'" width="20%" height="20%"/>';
		}
        echo '<label>Media:</label>
        <input type="file" name ="media" id="media" value="'.$return[0][1].'"><br>
        <label>Laboratório:</label>'.
        $result =$lab_crud->combox("laboratorio",$return[0][2])
        .'<br>
        <label>Tipo de media:</label>'.
        $result =$lab_crud->combox("mediatipo",$return[0][3])
        .'<br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="media">
        <input type="hidden" name="id" value="'.$return[0][0].'">
        <br><button type="submit">Alterar</button>
    </fieldset>
</form>
       ';
        break;
case "newlab":
	
	if(isset($_GET['act']) && $_GET['act'] == "up"){
		$data = array("idlaboratorio" => $id, "aprovado" => "N");
		$act = array("aprovado" => "S");
		$word = "aprovado";
	}else{
		$data = array("idlaboratorio" => $id, "aprovado" => "S");
		$act = array("aprovado" => "N");
		$word = "removido";
	}
	
	$resultado = $lab_crud->update("laboratorio", $data, "=", "AND", $act);
	if($resultado){
		echo '<script>
				alert("Laboratorio '.$word.'!");
				window.location.href = "main.php?s=listagem_tabelas&tbl=laboratorio";
			  </script>';
	}else{
		echo '<script>
				alert("Ocorreu um erro laboratório não foi '.$word.'!");
				window.location.href = "main.php?s=listagem_tabelas&tbl=laboratorio";
			  </script>';
	}
	break;
    default:
        echo '<script>
			alert("Ocorreu um problema! Contacte-nos!");
		  </script>';
        break;
}
?>













