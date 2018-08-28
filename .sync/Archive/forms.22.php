<?php include ("classes/combo.php");
$comb = new combo();
?>

<form method="post"  action="inserir.php" class="xpto">
    <fieldset>
        <legend>Distrito:</legend>
        <label>Distrito:  </label>
        <input type="text" name="distrito">
        <input type="hidden" name="form" value="distrito">
    <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post" action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Concelho:</legend>
        <label>Concelho:  </label>
        <input type="text" name ="concelho">
        <br><label>Distrito:</label>
       <?php echo $result =$comb->combox("distrito");?>
        <input type="hidden" name="form" value="concelho">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Intituição Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="instituicaotipo">
        <input type="hidden" name="estado" value="N">
        <input type="hidden" name="form" value="instituicaotipo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

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

<form method="post"  action="inserir.php" class="xpto" id="0">
    <fieldset>
        <legend>Media Tipo </legend>
        <label>Tipo:</label>
        <input type="text" name ="mediatipo">
        <input type="hidden" name="form" value="mediatipo">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

<form method="post" action="inserir.php"  class="xpto" id="0">
    <fieldset>
        <legend>Area </legend>
        <label>Area:</label>
        <input type="text" name ="area">
        <input type="hidden" name="form" value="area">
        <br><button type="submit">Adicionar</button>
    </fieldset>
</form>

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
        <legend>Laboratório </legend>
        <label>Laboratório:</label>
        <input type="text" name ="laboratorio"><br>
        <label>Instituição:</label>
        <?php echo $result =$comb->combox("instituicao");?><br>
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
        <?php echo $result =$comb->combox("concelho");?><br>
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