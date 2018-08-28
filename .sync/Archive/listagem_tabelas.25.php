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


$query = "SELECT * FROM ";
$query.= $tabela;
$query.=" WHERE deleted='N'";

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
        $print = '<table style="width:50%" border="1">
                    <tr>
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Logotipo</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>';

        while($result = $sql->fetch(PDO::FETCH_BOTH)){
            $print .='
                     <tr>
                        <td>'.$result[0].'</td>
                        <td>'.$result[1].'</td>
                        <td>'.$result[16].'</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>

        ';
        }




        break;

    default:

        while($result = $sql->fetch(PDO::FETCH_BOTH)){
        $print.='<tr>
                    <td>'.$result[0].'</td>
                    <td>'.$result[1].'</td>
                    <td><a href=""><img border="0" src="edit.gif" width="100" height="100"></a></td>
                    <td><a href=""><img border="0" src="eliminar.png" width="100" height="100"></a></td>
                </tr>
                ';
        }
        break;

}

echo $print.$final;






?>