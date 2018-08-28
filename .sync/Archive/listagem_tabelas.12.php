<?php

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
                        <td>'.$result[0][0].'</td>
                        <td>'.$result[0][1].'</td>
                        <td>'.$result[0][16].'</td>
                        <td>Editar</td>
                        <td>Apagar</td>
                    </tr>

        ';
        }




        break;

    default:
        $print.='<tr>
                    <td>'..'</td>
                    <td>'..'</td>
                    <td>'..'</td>
                    <td>'..'</td>
                </tr>
                ';
        break;

}


echo '


  <tr>
    <td>id</td>
    <td>nome</td>
    <td>btn_editar</td>
    <td>btn_apagar</td>
  </tr>



';






?>