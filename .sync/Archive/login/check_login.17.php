<?php
session_start();
include("LabApp.php");

$lab=new LabApp();

$mail =$_POST['mail'];
$pass =$_POST['pass'];

echo $mail;

$query = "
select *
from individuo
where email='$mail' and password = '$pass' and administrador='S' and aprovado ='S'";



$sql = $lab->conn->prepare($query);
$result = array();

try {
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_BOTH);
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}

if (!empty($result)){

    echo "sucesso";

}else {
    echo "Login incorreto";
}

?>