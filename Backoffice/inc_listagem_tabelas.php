<?php
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("../classes/LabApp.php");

$config = new LabApp("others");

if(isset($_GET['tbl'])){
	$tabela = $_GET['tbl'];
}else{
	$tabela = $_SESSION['tbl'];
}

echo "<div class='listing'>";
echo '<a class="add" name="'.$tabela.'" href="forms.php?tbl='.$tabela.'"><img src="../imagens/inserir.png" width="150"></a>';

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
        echo '<table align="center" style="margin-bottom:100px;" border="1">
                    <tr>
                        <td>Id</td>
                        <td>Nome</td>
                        <td>Logotipo</td>
						<td>Estado</td>
						<td>Acções</td>
                    </tr>';

        while($result = $sql->fetch(PDO::FETCH_BOTH)){
            echo '  <tr>
                        <td>'.$result[0].'</td>
                        <td>'.$result[1].'</td>';
						if(!empty($result[15]) && $result[15] != NULL && file_exists('../imagens/lab/'.$result[0].'/'.$result[15])){
                        	echo '<td><img border="0"  src="../imagens/lab/'.$result[0].'/'.$result[15].'" width="100" height="100"></td>';
						}else{
							echo '<td><img border="0"  src="../imagens/na.png" width="100" height="100"></td>';
						}
						if($result['aprovado'] == "S"){
							echo '<td><a href="editar.php?tbl=newlab&id='.$result[0].'&act=down"><img src="../imagens/demote.png" width="30" title="Rejeitar"/></a></td>';
						}else{
							echo '<td><a href="editar.php?tbl=newlab&id='.$result[0].'&act=up"><img src="../imagens/promote.png" width="30" title="Aceitar"/></a></td>';
						}
						echo '<td align="center"><a class="edit" name="'.$tabela.'" href="editar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/edit.png" width="20" height="20""></a>
                        <a class="delete" title="' .$result[1].'" name="'.$tabela.'" href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/delete.png" width="20" height="20"></a></td>
                    </tr></div>';
        }
        break;


    case "media":
        echo '<table align="center" style="margin-bottom:100px;" border="1">
				<tr>
					<td>Id</td>
					<td>Imagem</td>
					<td>Editar</td>
					<td>Acções</td>
				</tr>';
        while($result = $sql->fetch(PDO::FETCH_BOTH)){
            echo '<tr>
                    <td>'.$result[0].'</td>';
					if(!empty($result[1]) && $result[1] != NULL && file_exists('../imagens/media/'.$result[0].'/'.$result[1])){
						echo '<td><img border="0"  src="../imagens/media/'.$result[0].'/'.$result[1].'" width="100" height="100"></td>';
					}else{
						echo '<td><img border="0"  src="../imagens/na.png" width="100" height="100"></td>';
					}
                    echo '<td align="center"><a class="edit" name="'.$tabela.'" href="editar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/edit.png" width="20" height="20""></a>
                    <a class="delete" title="' .$result[1].'" name="'.$tabela.'" href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/delete.png" width="20" height="20"></a></td>
                </tr></div>
                ';
        }
        break;

    default:
		echo '<table align="center" style="margin-bottom:100px;" border="1">
				<tr>
					<td>Id</td>
					<td>Nome</td>
					<td>Acções</td>
				</tr>';
        while($result = $sql->fetch(PDO::FETCH_BOTH)){
        echo '<tr>
                    <td>'.$result[0].'</td>
                    <td>'.$result[1].'</td>
                    <td align="center"><a class="edit"  name="'.$tabela.'" href="editar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/edit.png" width="20" height="20""></a>
                    <a class="delete" title="' .$result[1].'" name="'.$tabela.'" href="script_eliminar.php?tbl='.$tabela.'&id='.$result[0]. '"><img border="0" src="../imagens/delete.png" width="20" height="20"></a></td>
                </tr></div>
                ';
        }
        break;

}

echo '</table>';
?>

<script>
$('.edit').on("click", function(event){
	var value = $(this).attr("name");
	var id = $(this).attr("href");
	id = id.split('=')[2];

	$.get("editar.php?tbl="+value+"&id="+id, function(data){
		$("article").html( data );
	});
	event.preventDefault();
});

$('.delete').on("click", function(event){
	var title = $(this).attr('title');
	var value = $(this).attr("name");
	var id = $(this).attr("href");
	
	if(confirm("Tem a certeza que pretende eliminar " + title + "?")){
		$.get("script_eliminar.php?tbl="+value+"&id="+id, function(data){
		}).done(function() {
			alert("Eliminado com sucesso!");
			location.reload();
		}).fail(function() {
			alert( "Ocorreu um erro na eliminação!" );
		});
	}
	event.preventDefault();
});

$('.add').on("click", function(event){
	var value = $(this).attr("name");

	$.get("forms.php?tbl="+value, function(data){
		$("article").html( data );
	});
	event.preventDefault();
});
</script>