<?php
function upload_imagem($entrada_form,$nomebox, $id){
		$pasta = "";
		switch($entrada_form){
			case "media":
				$pasta = "media/".$id."/";
			break;

			case "laboratorio":
				$pasta = "lab/".$id."/";
				break;

		}
		$target_dirx = "";


		$cenas =basename($_FILES["$nomebox"]["name"]);
		if($entrada_form == "laboratorio"){
			$target_dirx = "../imagens/" . $pasta;
		}else {
			$target_dirx = "../imagens/" . $pasta;

		}

		$target_file = $target_dirx.$cenas;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["$nomebox"]["tmp_name"]);//nome imgbox do form
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["$nomebox"]["size"] > 5000000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$target_file=$target_dirx."/videos/".$cenas;

		}
		
		//Verifica se o diretorio existe 
		if( is_dir($target_dirx) == false ){
			mkdir("$target_dirx", 0777); //se não existe é criado
		}
				
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["$nomebox"]["tmp_name"], $target_file)) {

			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
}

function upload_imagem2($entrada_form,$nomebox, $id){
		$pasta = "";
		switch($entrada_form){
			case "media":
				$pasta = "media/".$id."/";
			break;

			case "laboratorio":
				$pasta = "lab/".$id."/";
				break;

		}
		$target_dirx = "";


		$cenas =basename($_FILES["$nomebox"]["name"]);
		if($entrada_form == "laboratorio"){
			$target_dirx = "imagens/" . $pasta;
		}else {
			$target_dirx = "imagens/" . $pasta;

		}

		$target_file = $target_dirx.$cenas;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["$nomebox"]["tmp_name"]);//nome imgbox do form
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["$nomebox"]["size"] > 5000000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$target_file=$target_dirx."/videos/".$cenas;

		}
		
		//Verifica se o diretorio existe 
		if( is_dir($target_dirx) == false ){
			mkdir("$target_dirx", 0777); //se não existe é criado
		}
				
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["$nomebox"]["tmp_name"], $target_file)) {

			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
}
?>
