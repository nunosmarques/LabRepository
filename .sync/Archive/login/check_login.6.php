<?php include("LabApp.php");

$lab=new LabApp();

$mail =$_POST['mail'];
$pass =$_POST['pass'];


$query = "
select *
from individuo
where email='$mail' and password = '$pass' and administrador='S' and aprovado ='S'";


echo $mail;
echo $pass;