<?php 

$print = '
<center><table style=""  border="1">
<tr>
    <td height="100%">Instituição</td>
    <td height="100%">Detalhes</td>
</tr>
';

$final = '</table>';

$id=1;

//INDIVIDOS
$query = "SELECT lab.laboratorio,lab.idlaboratorio
FROM laboratorio lab
INNER JOIN instituicao inst ON inst.idinstituicao=lab.instituicao_idinstituicao
WHERE lab.instituicao_idinstituicao = '$id'";


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
                    <td height="100%">'.$result[0].'</td>
                    <td align="center"><a href="inc_laboratorio_detail.php?id='.$result[1].'"><img border="0" src="imagens/edit.png" width="20" height="20"></a></td>
                </tr>
                ';
}




echo $print.$final."<br><br>";







?>