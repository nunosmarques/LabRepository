<?php include ("classes/LabApp.php");

$config = new LabApp();

$print = '
<table style="width:50%" border="1">
<tr>
    <td>Id</td>
    <td>Nome</td>
    <td>Editar</td>
    <td>Eliminar</td>
</tr>
';
$final = '</table>';
$tabela=$_GET['tbl'];

$id=2;
$query = "SELECT * FROM individuo ind
inner join laboratorioindividuo lab on lab.laboratorio_idlaboratorio=ind.idindividuo
WHERE ind.idindividuo = '$id' and deleted='N'";


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
                    <td>'.$result[0].'</td>
                    <td>'.$result[1].'</td>
                    <td><a href="editar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="edit.gif"></a></td>
                    <td><a href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0].'"><img border="0" src="eliminar.png" width="20" height="20"></a></td>
                </tr>
                ';
        }




echo $print.$final;






?>