<?php
$data = array("individuo_idindividuo" => $id);

$result = $crud->select2("laboratorio inner join laboratorioindividuo on laboratorio_idlaboratorio = idlaboratorio", "=", $data, "AND", NULL);

if (sizeof($result) > 0){
    foreach ($result as $value) {
		echo '<div class="search_results">
				<div class="img">';
				if(!empty($value['logo']) && $value['logo'] != NULL && file_exists('imagens/lab/'.$value['logo'])){
					echo '<img src="imagens/lab/'.$value['logo'].'" width="100" />';
				}else{
					echo '<img src="imagens/na.png" width="100" />';
				}
				echo '</div>
						<div class="info">
							<p>
								<b>Laboratório:</b>
								<br />
								<a href="index.php?s=laboratorio_detail&id='.$value["idlaboratorio"].'" class="details" name="'.$value["laboratorio"].'">'.$value["laboratorio"].'</a>
							</p>
							<p>
								<b>Apresentação:</b>
								<br />
								'.$value["apresentacao"].'
							</p>
						</div>';
				if($value['edita'] == "S"){		
					echo   '<p>
								<a href="index.php?s=update&tbl=laboratorio&id='.$value["idlaboratorio"].'"><img src="imagens/edit.png" title="Editar '.$value["laboratorio"].'" width="30"/></a>
							</p>';
				}
			    echo '</div>';
    }
}else {
	echo '<div class="search_results"> <h4>Não está associado a nenhum laboratório!</h4> </div>';
}

?>