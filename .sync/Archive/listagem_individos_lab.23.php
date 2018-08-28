<?php
$print = '
<center><table style="" border="1">
<tr>
    <td>Nome</td>
    <td>Detalhe Individuo</td>
</tr>
';
$print2 = '
<center><table style="" border="1">
<tr>
    <td>Imagem</td>
</tr>
';

$print3 = '
<center><table style=""border="1">
<tr>
    <td>Equipamento</td>
    <td>Tipo de Equipamento</td>
</tr>
';
$final = '</table>';



//INDIVIDOS
$query = "SELECT * FROM individuo ind
inner join laboratorioindividuo lab on lab.laboratorio_idlaboratorio=ind.idindividuo
WHERE lab.laboratorio_idlaboratorio = '$id' and deleted='N'";


$sql = $config->conn->prepare($query);

try {
    $sql->execute();
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}



        while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $print.='<tr>
                    <td>'.$result[1].'</td>
                    <td align="center"><a class="details" name="'.$id.'" href="inc_individuo_detail.php?id='.$id.'"><img border="0" src="imagens/details.png" width="20" height="20"></a></td>
                </tr>
                ';
        }


//MEDIA
$query = "SELECT * FROM media
WHERE laboratorio_idlaboratorio = '$id' and deleted='N'";


$sql = $config->conn->prepare($query);

try {
    $sql->execute();
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}



while($result = $sql->fetch(PDO::FETCH_BOTH)){
    $print2.='<tr>
                    <td>'.$result[1].'</td>
                    <td><img border="0" alt="W3Schools" src="logo_w3s.gif" width="100" height="100">
                </tr>
                ';
}

//EQUIPAMENTO
$query = "SELECT equip.equipamento,tipo.equipamentotipo
FROM equipamento equip
inner join laboratorioequipamento labequip on labequip.equipamento_idequipamento=equip.idequipamento
inner join laboratorio lab on lab.idlaboratorio=labequip.laboratorio_idlaboratorio
inner join equipamentotipo tipo on tipo.idequipamentotipo=equip.equipamentotipo_idequipamentotipo
WHERE lab.idlaboratorio='$id'";


$sql = $config->conn->prepare($query);

try {
    $sql->execute();
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}



while($result = $sql->fetch(PDO::FETCH_BOTH)){
    $print3.='<tr>
                    <td>'.$result[0].'</td>
                    <td>'.$result[1].'</td>
                </tr>
                ';
}


echo $print.$final."<br><br>";
echo $print2.$final."<br><br>";
echo $print3.$final."<br><br>";

?>
<script>
$(".details").on("click", function(){
	var value = $(this).attr("name");
		
	$.get("inc_individuo_detail.php?id="+value, function(data){
		$("article").html( data );
	});
	event.preventDefault();
});
</script>