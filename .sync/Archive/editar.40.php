<?php include ("classes/class_crud.php");

$lab_crud = new CRUD();


$tabela = $_GET['tbl'];
$id =  $_GET['id'];
$data = array("id".$tabela => $id);
//print_r($data);
//SELECT
$return = $lab_crud->select($tabela," = ", $data, NULL, 5);
//print_r($return);
echo $return[0][1];



switch($tabela){

    case "concelho":
       echo '
    <form method="post" action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Concelho:</legend>
        <label>Concelho:  </label>
        <input type="text" name ="concelho" value="'.$return[0][1].'">
        <br><label>Distrito:</label>'.
        $result =$lab_crud->combox("distrito",$return[0][2]).'
        <input type="hidden" name="form" value="concelho">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>';
        break;

    case "distrito":
       echo '<form method="post"  action="inserir.php" class="xpto">
    <fieldset>
        <legend>Distrito:</legend>
        <label>Distrito:  </label>
        <input type="text" name="distrito" value="'.$return[0][1].'">
        <input type="hidden" name="form" value="distrito">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>';
        break;

    case "instituicao":
echo '<form method="post" action="inserir.php"  class="xpto" id="0">
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
        <br><button type="submit">Adicionar</button>
        </fieldset>
        </form>';
        break;

    case "instituicaotipo":
       echo '
<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Intituição Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="instituicaotipo" value="'.$return[0][1].'">
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="instituicaotipo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>
';
        break;

    case "laboratorio":
       echo '
<form method="post" action="inserir.php"  class="xpto" id="0">
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
        <textarea name="apresentacao" rows="4" cols="50">'.$return[0][14].'</textarea><br>
        <label>Logo:</label>
        <input type="file" name="logo" id="logo" value="'.$return[0][15].'"><br>
        <label>Foto:</label>
        <input type="file" name="foto" id="foto" value="'.$return[0][16].'"><br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="laboratorio">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

       ';
        break;

    case "laboratorioarea":
        echo '
        <form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Laboratorio Area </legend>
        <label>Laboratório:</label>
        <?php echo $result =$comb->combox("laboratorio");?><br>
        <label>Area:</label>
        <?php echo $result =$comb->combox("area");?><br>
        <label>Ordem:</label>
        <input type="text" name ="ordem">
        <input type="hidden" name="form" value="laboratorioarea">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

        ';
        break;

    case "area":
       echo'
           <form method="post" action="inserir.php"  class="xpto" id="0">
    <fieldset>
        <legend>Area </legend>
        <label>Area:</label>
        <input type="text" name ="area">
        <input type="hidden" name="form" value="area">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>
       ';
        break;

    case "individuoarea":
        $data_ins = array(
            "individuo_idindividuo" => $_POST['individuo'],
            "area_idarea" => $_POST['area'],
            "ordem" => $_POST['ordem']
        );
        break;

    case "individuo":
        $data_ins = array(
            "nome" => $_POST['nome'],
            "morada" => $_POST['morada'],
            "codigopostal" => $_POST['codigopostal'],
            "localidade" => $_POST['localidade'],
            "telemovel" => $_POST['telemovel'],
            "telefone" => $_POST['telefone'],
            "fax" => $_POST['fax'],
            "email" => $_POST['email'],
            "cv" => $_POST['cv'],
            "twitter" => $_POST['twitter'],
            "fb" => $_POST['fb'],
            "linkedin" => $_POST['linkedin'],
            "password" => $_POST['password'],
            "deleted" => $_POST['deleted']
        );
        break;

    case "laboratorioindividuo":
        $data_ins = array(
            "individuo_idindividuo" => $_POST['individuo'],
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "coordenador" => $_POST['coordenador'],
            "edita" => $_POST['edita'],
        );
        break;

    case "laboratorioequipamento":
        $data_ins = array(
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "equipamento_idequipamento" => $_POST['equipamento']
        );
        break;

    case "equipamento":
        $data_ins = array(
            "equipamento" => $_POST['equipamento'],
            "equipamentotipo_idequipamentotipo" => $_POST['equipamentotipo']
        );
        break;

    case "equipamentotipo":
        echo '
        <form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Equipamento Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="equipamentotipo">
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="equipamentotipo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

        ';
        break;

    case "mediatipo":
      echo '
      <form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Media Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="mediatipo">
        <input type="hidden" name="form" value="mediatipo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>
      ';
        break;

    case "media":
        $data_ins = array(
            "media" => $_POST['media'],
            "laboratorio_idlaboratorio" => $_POST['laboratorio'],
            "mediatipo_idmediatipo" => $_POST['media'],
            "deleted" => $_POST['deleted']
        );
        break;


    default:
        echo '<script>
			alert("form não existente");
		  </script>';
        break;


}
?>













<form method="post" action="inserir.php"  class="xpto" id="0">
    <fieldset>
        <legend>Instituição </legend>
        <label>Instituição:</label>
        <input type="text" name ="instituicao"><br>
        <label>Instituição Tipo:</label>
        <?php echo $result =$comb->combox("instituicaotipo");?><br>
        <label>Morada:</label>
        <input type="text" name ="morada"><br>
        <label>Codigo-Postal:</label>
        <input type="text" name ="codigopostal"><br>
        <label>Localidade:</label>
        <input type="text" name ="localidade"><br>
        <label>Telefone:</label>
        <input type="text" name ="telefone"><br>
        <label>Website:</label>
        <input type="text" name ="website"><br>
        <label>Fax:</label>
        <input type="text" name ="fax"><br>
        <label>E-mail:</label>
        <input type="text" name ="email"><br>
        <label>Concelho:</label>
        <?php echo $result =$comb->combox("concelho");?>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="instituicao">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>



<form method="post" action="inserir.php"  class="xpto" id="0">
    <fieldset>
        <legend>IndividuoArea </legend>
        <label>Individuo:</label>
        <?php echo $result =$comb->combox("individuo");?><br>
        <label>Area:</label>
        <?php echo $result =$comb->combox("area");?><br>
        <label>Ordem:</label>
        <input type="text" name ="ordem">
        <input type="hidden" name="form" value="individuoarea">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Laboratorio Individuo </legend>
        <label>Individuo:</label>
        <?php echo $result =$comb->combox("individuo");?><br>
        <label>Laboratório:</label>
        <?php echo $result =$comb->combox("laboratorio");?><br>
        <label>Coordenador:</label>
        <select name="coordenador">
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
        <label>edita:</label>
        <select name="edita">
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
        <input type="hidden" name="form" value="laboratorioindividuo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>



<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Media </legend>
        <label>Media:</label>
        <input type="text" name ="media"><br>
        <label>Laboratório:</label>
        <?php echo $result =$comb->combox("laboratorio");?><br>
        <label>Tipo de media:</label>
        <?php echo $result =$comb->combox("mediatipo");?><br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="media">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post" action="inserir.php"  class="xpto" id="0">
    <fieldset>
        <legend>Equipamento </legend>
        <label>Equipamento:</label>
        <input type="text" name ="equipamento"><br>
        <label>Tipo Equipamento:</label>
        <?php echo $result =$comb->combox("equipamentotipo");?><br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="equipamento">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Laboratorio Equipamento </legend>
        <label>Laboratório:</label>
        <?php echo $result =$comb->combox("laboratorio");?><br>
        <label>Equipamento:</label>
        <?php echo $result =$comb->combox("equipamento");?><br>
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="laboratorioequipamento">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post"  action="inserir.php" class="xpto" id="0">
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
        <input type="hidden" name="deleted" value="N">
        <input type="hidden" name="form" value="individuo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>


