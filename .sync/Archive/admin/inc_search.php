<?php
$s = $_GET['s'];

switch($s){
	case "laboratorios":
		echo '<form method="post" action="index.php?s=laboratorios" class="procura" id="laboratorios">
				<p>
					<label>Nome Laboratório: </label>
					<br />
					<input type="text" name="lab" id="lab.laboratorio" placeholder="Laboratoiro da ESTA">
				</p>
				
				<p>
					<label>Localização: </label>
					<br />
					<input type="text" name="local" id="lab.localidade" placeholder="Abrantes">
				</p>
				
				<p>
					<label>Intituição: </label>
					<br />
					<input type="text" name="inst" id="i.instituicao" placeholder="Camara Municipal">
				</p>
								
				<button name="pesquisa" type="submit" form="laboratorios" value="laboratorios">Pesquisar Laboratorio</button>
			</form>';
		break;
	case "instituicoes":
		echo '<form method="post" action="index.php?s=instituicoes" class="procura" id="instituicoes">
				<p>
					<label>Nome da Instituição: </label>
					<br />
					<input type="text" name="inst" id="i.instituicao" placeholder="Fundação Champalimou">
				</p>
				
				<p>
					<label>Morada: </label>
					<br />
					<input type="text" name="morada" id="i.morada" placeholder="Rua João Albuquerque">
				</p>
				
				<p>
					<label>Localização: </label>
					<br />
					<input type="text" name="local" id="i.localidade" placeholder="Abrantes">
				</p>
				
				<p>
					<label>Laboratório: </label>
					<br />
					<input type="text" name="lab" id="lab.laboratorio" placeholder="Laboratório de Informática">
				</p>
				
				<p>
					<label>Código Postal:</label>
					<br />
					<input type="text" name="cp" id="i.codigopostal" placeholder="2000">
				</p>
				
				<button name="pesquisa" type="submit" form="instituicoes" value="instituicoes">Pesquisar Laboratorio</button>
			</form>';
		break;
	case "individuos":
		echo '<form method="post"  action="index.php?s=individuos" class="procura" id="individuos">
				<p>
					<label>Nome: </label>
					<br />
					<input type="text" name="nome" id="id.nome" placeholder="Manuel">
				</p>
				
				<p>
					<label>Instituição: </label>
					<br />
					<input type="text" name="inst" id="i.instituicao" placeholder="Fundação Champalimou">
				</p>
				
				<p>
					<label>Laboratório: </label>
					<br />
					<input type="text" name="lab" id="lab.laboratorio" placeholder="Laboratório de Informática">
				</p>	
							
				<p>
					<label>Localização: </label>
					<br />
					<input type="text" name="local" id="id.localidade" placeholder="Abrantes">
				</p>
				
				<p>
					<label>Email:</label>
					<br />
					<input type="text" name="mail" id="id.email" placeholder="teste@gmail.com">
				</p>
				
				<button name="pesquisa" type="submit" form="individuos" value="individuos">Pesquisar Laboratorio</button>
			</form>';
		break;		
	default:
		break;
			
}
?>
<script>
//Efetuar a pesquisa
$(".procura").on("submit", function(){
	var page = $(".procura :input");
	var dados = new Array();
	var length = page.length - 1;
	var combo_name = $(this).attr("id");
	for(var i = 0; i < length; i++){
		if($(page[i]).val().length > 0){
			if(!isNaN(page[i].value)){
				dados.push($(page[i]).attr('id') + " LIKE " + page[i].value+"");
			}else{
				dados.push($(page[i]).attr('id') + " LIKE '%" + page[i].value+"%'");
			}
		}
	}
	//console.log("inc_"+combo_name+".php");
	
	$.post("inc_"+combo_name+".php",
	{
		"data"    : dados,
		"limite"  : 5
	},
	function(data, status){
		$("article").html( data );
	});
	
	event.preventDefault();
});
</script>