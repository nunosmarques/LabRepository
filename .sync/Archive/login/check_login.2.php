<?php include("LabApp.php");

$lab=new LabApp();

$mail =$_POST['user'];
$pass =$_POST['pass'];


$query = "
select *
from individuo
where email='$mail' and administrador='S' and aprovado ='S'";