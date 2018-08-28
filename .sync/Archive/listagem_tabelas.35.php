<?php include ("classes/LabApp.php");

$config = new LabApp();


//$final = '</table>';
$tabela = $_GET['tbl'];


$query = "SELECT * FROM ".$tabela." WHERE deleted='N'";

$sql = $config->conn->prepare($query);

try {
    $sql->execute();
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}



switch($tabela){
    case "laboratorio":
        echo '<table style="width:50%" border="1">
                    <tr>
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Logotipo</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>';

        while($result = $sql->fetch(PDO::FETCH_BOTH)){
            echo '  <tr>
                        <td>'.$result[0].'</td>
                        <td>'.$result[1].'</td>
                        <td>'.$result[16].'</td>
                        <td align="center"><a href="editar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="imagens/edit.png" width="20" height="20""></a></td>
                        <td align="center"><a href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="imagens/delete.png" width="20" height="20"></a></td>
                    </tr>

        ';
        }
        break;

    default:
		echo '<table style="width:50%" border="1">
				<tr>
					<td>Id</td>
					<td>Nome</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>';
        while($result = $sql->fetch(PDO::FETCH_BOTH)){
        echo '<tr>
                    <td>'.$result[0].'</td>
                    <td>'.$result[1].'</td>
                    <td align="center"><a href="editar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="imagens/edit.png" width="20" height="20""></a></td>
                    <td align="center"><a href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="imagens/delete.png" width="20" height="20"></a></td>
                </tr>
                ';
        }
        break;

}

echo '</table>';






?>