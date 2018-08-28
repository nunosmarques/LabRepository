<?php include("LabApp.php");

$lab=new LabApp();

$mail =$_POST['mail'];
$pass =$_POST['pass'];


$query = "
select *
from individuo
where email='$mail' and password = '$pass' and administrador='S' and aprovado ='S'";



$sql = $lab->conn->prepare($query);
$result = array();

try {
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $ex){
    echo '<script>
			alert("Ocorreu um erro: \\n'.$ex->getMessage().'");
		  </script>';
}
?>