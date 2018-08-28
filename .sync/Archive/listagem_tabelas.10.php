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
            echo '<div class="search_results">
			<div class="img">
			<img src="imagens/na.png">
			</div>
			<div class="info">
				<p>'.$result["instituicao"].'</p>
		    </div>
		 </div>';
        }
        $print .='
                     <tr>
                        <td>'..'</td>
                        <td>'..'</td>
                        <td>'..'</td>
                        <td>'..'</td>
                        <td>'..'</td>
                    </tr>

        ';



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