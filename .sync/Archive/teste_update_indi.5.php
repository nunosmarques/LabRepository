<?php session_start();
if($_SESSION['admin'] != true){ $_SESSION['admin'] = false; header('location:index.php'); }
include("./classes/class_crud.php");
include("./upload_script.php");

$lab_crud = new CRUD("");
$dados = "conas";
        $data_ins = array(
            "nome" => $dados,
            "morada" => $dados,
            "codigopostal" => $dados,
            "localidade" => $dados,
            "telemovel" => $dados,
            "telefone" => $dados,
            "fax" => $dados,
            "email" => $dados,
            "cv" => $dados,
            "twitter" => $dados,
            "fb" => $dados,
            "linkedin" => $dados,
            "password" => $dados,
            "deleted" => $dados
        );


$id = $_POST['id'];
$data = array("id".$_POST['form'] => $id);
$result = $lab_crud->update($_POST['form'], $data, " = ", "", $data_ins);

if($result != false){
    echo '<script>
			alert("Modificado com sucesso.");
		  </script>';

    if(isset($_FILES['logo']) && file_exists($_FILES['logo']['tmp_name'])) {
        $entrada_form = "laboratorio";//nome do form
        $nomebox = "logo";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    if(isset($_FILES['foto'])&& file_exists($_FILES['foto']['tmp_name'])) {
        $entrada_form = "laboratorio";//nome do form
        $nomebox = "foto";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    if(isset($_FILES['media'])&& file_exists($_FILES['media']['tmp_name'])) {
        $entrada_form = "media";//nome do form
        $nomebox = "media";//nome do campo(post imagebox name)
        upload_imagem($entrada_form, $nomebox, $id);
    }

    header("Location:main.php?s=listagem_tabelas&tbl=".$_POST['form']);



}else{
    echo '<script>
			alert("Ocorreu um erro na alteração!");
		  </script>';
}


?>